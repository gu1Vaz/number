<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        User::create(
            ['name'=>'Tupa','email'=>'g7@gmail.com','password'=>'12345678']
        );
    }
}
