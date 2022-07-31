<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(GruposTableSeeder::class);
        $this->call(NumerosTableSeeder::class);
        $this->call(FavoritosTableSeeder::class);
    }
}
