<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Naufal Fawwaz",
            "email" => "fawaznaufal32@gmail.com",
            "password" => Hash::make("andriawan24")
        ]);
    }
}
