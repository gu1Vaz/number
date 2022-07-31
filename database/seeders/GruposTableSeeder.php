<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grupo::create(
            ['nome'=>'Medicos']
        );
        Grupo::create(
            ['nome'=>'Cefet']
        );
        Grupo::create(
            ['nome'=>'Programadores']
        );
        Grupo::create(
            ['nome'=>'Segurança']
        );
        Grupo::create(
            ['nome'=>'Padarias']
        );
    }
}
