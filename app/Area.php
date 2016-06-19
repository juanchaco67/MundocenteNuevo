<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table = "areas";
    protected $fillable = ['id', 'nombre'];

    public function interes(){
    	return $this->hasMany('App\Interes');
    }

    public function grupo(){
    	return $this->hasMany('App\Grupo');
    }
}
