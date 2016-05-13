<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Publicacion;
use Illuminate\Support\Facades\Input;

class PublicacionesController extends Controller
{
    //
    public function index(){
        //return "index";
        //return view('publicacion.index');
        $valor = Input::get('valor');
        $publicaciones = Publicacion::where('nombre', 'like', '%'.$valor.'%')
          ->orwhere('descripcion', 'like', '%'.$valor.'%')->get();
        return view('publicaciones')->with('publicaciones', $publicaciones);
        return $valor;
    }

    public function create(){
        //return "create";
        //return view('publicacion.create');
        return "index";
    }

    public function store(Request $request){
        //return "store";
        Publicacion::create([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
        ]);
    }

    public function show($id){
        return "show";
        //$publicaciones = Publicacion::find($id);
        //return view('index')->with('publicaciones', $publicaciones);
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
