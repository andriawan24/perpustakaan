<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\KetuaMurid;

class KetuaMuridTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 10; $i++) { 
            KetuaMurid::create([
                'nis' => $faker->randomNumber(),
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'no_tlp' => $faker->phoneNumber,
                'tlp_ortu' => $faker->phoneNumber,
                'email' => $faker->email
            ]);
        }
    }
}
