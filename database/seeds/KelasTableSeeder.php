<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Kelas;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i <= 6; $i++) { 
            Kelas::create([
                'nama' => "X TKI " . $i,
                'id_walikelas' => $faker->numberBetween(1, 9),
                'id_ketuamurid' => $faker->numberBetween(1, 9)
            ]);
        }
    }
}
