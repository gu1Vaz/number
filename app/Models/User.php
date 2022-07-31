<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function  numeros(){
        return $this->belongsToMany("App\Models\Numeros","favoritos",'user_id','numero_id')->withPivot([
                            'id',
                            'user_id',
                            'numero_id',
                            'user_id',
                        ]);
        //return $this->belongsToMany("App\Models\Numeros","favoritos",'user_id','numero_id');
    }
    public function  numero(){
        return $this->hasMany("App\Models\Numeros");
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
