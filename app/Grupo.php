<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
	protected $table = 'grupos';
    protected $fillable = ['area_id', 'publicacion_id'];

    public function area(){
    	return $this->belongsTo('App\Area');
    }

    public function publicacion(){
    	return $this->belongsTo('App\Publicacion');
    }

}
