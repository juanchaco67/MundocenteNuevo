<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Establecimiento;

class EstablecimientoController extends Controller
{
    //
     public function index(){
        $establecimientos = Establecimiento::all();
        return view('establecimiento.index', compact('establecimientos'));



        /*
        $establecimientoes = establecimiento::where('nombre', 'like', '%'.$valor.'%')
          ->orwhere('descripcion', 'like', '%'.$valor.'%')->get();
        return view('establecimiento.index')->with('establecimientoes', $establecimientoes);
        return $valor;
        */
    }

    public function create(){
        //return "create";
        return view('establecimiento.create');
        //return "index";
    }

    public function store(Request $request){
        //return "store";
        Establecimiento::create([
            //'nombre' => $request['nombre'],
            'nombre' => $request['nombre'],
        ]);

        Session::flash('mensaje', 'Establecimiento creado');
        return Redirect::to('establecimiento');        
    }

    public function show($id){
        return "show";
        //$establecimientoes = establecimiento::find($id);
        //return view('index')->with('establecimientoes', $establecimientoes);
    }

    public function edit($id){
        //return "edit";
        $establecimiento = Establecimiento::find($id);
        return view('establecimiento.edit', [
            'establecimiento' => $establecimiento,
        ]);        
    }

    public function update($id, establecimientoUpdateRequest $request){
        //return "update";
        $establecimiento = Establecimiento::find($id);
        $establecimiento->fill($request->all());
        $establecimiento->save();

        Session::flash('mensaje', 'Establecimiento Editado');
        return Redirect::to('establecimiento');
    }

    public function destroy($id){
    	//return "destroy";
        establecimiento::destroy($id);

        Session::flash('mensaje', 'Establecimiento Eliminado');
        return Redirect::to('establecimiento');
    }
}
