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
        $this->call(UsersTableSeeder::class);
        $this->call(UserDataTableSeeder::class);
        $this->call(ZonaTableSeeder::class);
        $this->call(PilihanTableSeeder::class);
        $this->call(RiwayatTableSeeder::class);
        $this->call(PencegahanTableSeeder::class);
        $this->call(ObatTableSeeder::class);
        $this->call(DosisTableSeeder::class);
    }
}
