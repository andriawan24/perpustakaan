<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BukuTableSeeder::class);
        $this->call(WaliKelasTableSeeder::class);
        $this->call(KetuaMuridTableSeeder::class);
        // $this->call(AnggotaTableSeeder::class);
    }
}
