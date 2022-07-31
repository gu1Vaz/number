<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorito;
class FavoritosTableSeeder extends Seeder
{

    public function run()
    {
        Favorito::create(
            ['numero_id'=>'2','user_id'=>'1']
        );
        Favorito::create(
            ['numero_id'=>'1','user_id'=>'1']
        );
        Favorito::create(
            ['numero_id'=>'3','user_id'=>'1']
        );
    }
}
