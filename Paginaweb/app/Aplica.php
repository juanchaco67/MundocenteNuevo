<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplica extends Model
{
 protected $table = 'aplicaciones';
    protected $fillable = ['lugar_id', 'publicacion_id'];

    public function luagar(){
    	return $this->belongsTo('App\Lugar');
    }

    public function publicacion(){
    	return $this->belongsTo('App\Publicacion');
    }

}
