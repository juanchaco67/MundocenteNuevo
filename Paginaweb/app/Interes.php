<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interes extends Model
{
    //
    protected $table = "intereses";
    protected $fillable = ['area_id', 'docente_id'];

    public function docente(){
    	return $this->belongsTo('App\Docente');
    }

    public function area(){
    	return $this->belongsTo('App\Area');
    }
}
