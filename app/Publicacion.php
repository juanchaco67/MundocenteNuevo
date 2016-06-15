<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    //
    protected $table = "publicaciones";
    protected $fillable = ['id', 'funcionario_id', 'nombre', 'resumen', 'descripcion', 'tipo', 'lugar_id', 'fecha_publicacion', 'fecha_cierre'];

    public function grupo(){
    	return $this->hasMany('App\Grupo');
    }

    public function funcionario(){
		return $this->belongsTo('App\Funcionario');
	}

	public function lugar(){
		return $this->belongsTo('App\Lugar');
	}
}
