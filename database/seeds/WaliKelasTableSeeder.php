<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\WaliKelas;

class WaliKelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i <= 10; $i++) { 
            WaliKelas::create([
                'nip' => $faker->randomNumber(16),
                'nama' => $faker->name,
                'alamat' => $faker->address(),
                'no_tlp' => $faker->phoneNumber,
                'email' => $faker->email
            ]);
        }
    }
}
