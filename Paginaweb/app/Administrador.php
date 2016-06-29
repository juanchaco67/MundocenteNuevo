<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    //
    protected $table = 'administradores';
    protected $fillable = ['id', 'user_id'];

    public function user(){
		return $this->belongsTo('App\User');
	}
}
