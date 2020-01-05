<?php

use Illuminate\Database\Seeder;
use App\Anggota;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AnggotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("id_ID");
        for ($i=0; $i < 10; $i++) { 
            Anggota::create([
                "nama" => $faker->name,
                "id_kelas" => 1,
                "jk" => 1,
                "alamat" => $faker->address,
                "no_tlp" => $faker->phoneNumber,
                "tlp_ortu" => $faker->phoneNumber,
                "email" => $faker->email,
                "password" => Hash::make($faker->sentence)
            ]);   
        }
    }
}
