<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PublicacionesController extends Controller
{
    //
    public function index(){
        //return "index";
        return view('publicacion.index');
    }

    public function create(){
        //return "create";
        return view('publicacion.create');
    }

    public function store(Request $request){
        //return "store";
        Publicacion::create([
            'nombre' => $request['nombre'];
            'descripcion' => $request['descripcion'],
        ]);
    }

    public function show($id){
        return "show";
    }

    public function edit($id){
        return "edit";
    }

    public function update($id){
        return "update";
    }

    public function destroy($id){
    	return "destroy";
    }
}
