<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    //
    protected $table = 'funcionarios';
    protected $fillable = ['user_id', 'establecimiento_id', 'apellido', 'telefono'];

    public function user(){
		return $this->belongsTo('App\User');
	}

	public function publicacion(){
		return $this->hasMany('App\Publicacion');
	}

	public function establecimiento(){
		return $this->belongsTo('App\Establecimiento');
	}
}
