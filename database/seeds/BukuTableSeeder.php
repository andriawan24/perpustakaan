<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Buku;

class BukuTableSeeder extends Seeder
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
            Buku::create([
                'judul' => $faker->sentence(4),
                'penulis' => $faker->name,
                'penerbit' => $faker->company,
                'jumlah' => $faker->numberBetween(1, 30),
                'tanggal_regis' => date('Y-m-d'),
                'cover' => $faker->image()
            ]);
        }
    }
}
