<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'idrol', 'estado', 'apellido',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function interes(){
        return $this->hasMany('App\Interes');
    }

    public function docente(){
        return $this->hasOne('App\Docente');
    }

    public function funcionario(){
        return $this->hasOne('App\Funcionario');
    }

    public function setPasswordAttribute($valor){
        if (!empty($valor)) {
            $this->attributes['password'] = \Hash::make($valor);
        }
    }
}
