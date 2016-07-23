<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    //
    protected $table ="lugares";
    protected $fillable =['id','ubicacion_id','nombre', 'tipo', 'created_at', 'updated_at'];

    public function aplica(){
    	return $this->hasMany('App\Aplica');
    }
}
