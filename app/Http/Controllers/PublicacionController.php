<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Publicacion;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use App\Http\Requests\PublicacionUpdateRequest;
use Auth;

class PublicacionController extends Controller
{
    //
    public function index(){
        //return "index";
        //return view('publicacion.index');
        //$valor = Input::get('valor');

        $publicaciones = Publicacion::all();
        return view('publicacion.index', compact('publicaciones'));

        /*
        $publicaciones = Publicacion::where('nombre', 'like', '%'.$valor.'%')
          ->orwhere('descripcion', 'like', '%'.$valor.'%')->get();
        return view('publicacion.index')->with('publicaciones', $publicaciones);
        return $valor;
        */
    }

    public function create(){
        //return "create";
        return view('publicacion.create');
        //return "index";
    }

    public function store(Request $request){
        //return "store";
        //return $request['tipo'] ." ". $request['fecha_cierre'];
        Publicacion::create([
            'funcionario_id' => Auth::user()->funcionario->id,
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'tipo' => $request['tipo'],
            'fecha_cierre' => $request['fecha_cierre'],
        ]);

        Session::flash('mensaje', 'Publicacion creada');
        return Redirect::to('publicacion');        
    }

    public function show($id){
        return "show";
        //$publicaciones = Publicacion::find($id);
        //return view('index')->with('publicaciones', $publicaciones);
    }

    public function edit($id){
        //return "edit";
        $publicacion = publicacion::find($id);
        return view('publicacion.edit', [
            'publicacion' => $publicacion,
        ]);        
    }

    public function update($id, PublicacionUpdateRequest $request){
        //return "update";
        $publicacion = Publicacion::find($id);
        $publicacion->fill($request->all());
        $publicacion->save();

        Session::flash('mensaje', 'Publicacion Editada');
        return Redirect::to('publicacion');
    }

    public function destroy($id){
    	//return "destroy";
        Publicacion::destroy($id);

        Session::flash('mensaje', 'Publicacion Eliminada');
        return Redirect::to('publicacion');
    }
}
