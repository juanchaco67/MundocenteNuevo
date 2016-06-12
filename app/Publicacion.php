<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    //
    protected $table = "publicaciones";
    protected $fillable = ['nombre', 'descripcion', 'fecha_publicacion'];

    public function grupo(){
    	return $this->hasMany('App\Grupo');
    }
}
