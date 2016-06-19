<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Prueba extends Controller
{

    public function recibir($tipos, $areas, $ciudades, $universidades){
    	return "Tipos ". $tipos . " Areas " . $areas . "Ciudades " . $ciudades . " universidades " . $universidades;
    }

    public function filtros(Requests $request){
    	return $request;
    }
}
