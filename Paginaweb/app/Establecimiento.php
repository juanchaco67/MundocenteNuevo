<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    //
    protected $table = 'establecimientos';
    protected $fillable = ['id', 'nombre'];

    public function funcionario(){
		return $this->hasMany('App\Funcionario');
	}
}
