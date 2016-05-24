<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
    protected $table = 'docentes';
    protected $fillable = ['user_id', 'notificar', 'apellido'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function interes(){
        return $this->hasMany('App\Interes');
    }
}
