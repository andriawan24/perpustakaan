<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Anggota;

class AnggotaTableSeeder extends Seeder
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
            Anggota::create([
                'nama' => $faker->name,
                'id_kelas' => $faker->numberBetween(1, 6),
                'alamat' => $faker->address,
                'no_tlp' => $faker->phoneNumber,
                'tlp_ortu' => $faker->phoneNumber,
                'email' => $faker->email
            ]);
        }
    }
}
