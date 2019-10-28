<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected function successfulLoginRoute()
    {
        return route('home');
    }

    protected function loginGetRoute()
    {
        return route('login');
    }
    
    protected function loginPostRoute()
    {
        return route('login');
    }

    public function test_user_can_view_login_page()
    {
        $response = $this->get($this->loginGetRoute());

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');  
    }

    public function test_user_cannot_view_login_page_when_authenticated()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get($this->loginGetRoute());

        $response->assertRedirect($this->successfulLoginRoute());
    }

    public function test_login_with_valid_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'akucintasekolah')
        ]);

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => $password
        ]);

        $response->assertRedirect($this->successfulLoginRoute());
        $this->assertAuthenticatedAs($user);
    }

    public function testRememberMeFunctionality()
    {
        $user = factory(User::class)->create([
            'id' => random_int(1, 100),
            'password' => Hash::make($password = 'akucintasekolah')
        ]);

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => $password,
            'remember' => 'on'
        ]);

        $user = $user->fresh();

        $response->assertRedirect($this->successfulLoginRoute());
        $response->assertCookie(Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
            $user->id,
            $user->getRememberToken(),
            $user->password
        ]));
        $this->assertAuthenticatedAs($user);
    }

    public function testUserCannotLoginWithIncorrectPassword()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = "akucintasekolah")
        ]);

        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => 'invalid-password'
        ]);
        
        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotLoginWithEmailDoesNotExist()
    {
        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
            'email' => 'nobody@example.com',
            'password' => 'invalid-password'
        ]);

        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCanLogout()
    {
        $this->be(factory(User::class)->create());

        $response = $this->post(route('logout'));

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
