<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Numeros extends Model
{
    protected $fillable = ['ref','pais','ddd','numero','tipo','grupo_id','user_id','image_url'];
    public function  grupo(){
        return $this->belongsTo("App\Models\Grupo");
    }
    public function  users(){
        return $this->belongsToMany("App\Models\User","favoritos",'numero_id','user_id');
    }
    public function  user(){
        return $this->belongsTo("App\Models\User");
    }
}
