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
        Anggota::create([
            'nama' => "Naufal Fawwaz Andriawan",
            'id_kelas' => 1,
            'alamat' => "Jl. Sawahlega no. 35 RT02 RW06",
            'jk' => 0,
            'no_tlp' => "087787871366",
            'tlp_ortu' => "08156087878",
            'email' => "fawaznaufal32@gmail.com",
            "password" => Hash::make("andriawan24")
        ]);
    }
}
