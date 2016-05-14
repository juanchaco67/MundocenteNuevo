<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Publicacion;

class BuscadorController extends Controller
{
    //
    public function index(){
        $publicaciones = Publicacion::all();
        return view('publicacion.index', compact('publicaciones'));
    }

    public function create(){
        //return "create";
        return view('publicacion.create');
        //return "index";
    }
}
