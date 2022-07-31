<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public function  numeros(){
        return $this->hasMany("App\Models\Numeros")->orderBy('created_at','DESC');
    }
}
