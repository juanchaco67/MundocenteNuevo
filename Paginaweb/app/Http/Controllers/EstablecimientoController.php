<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Establecimiento;
use Session;
use Redirect;
use Auth;
use App\User;
use App\Area;
use App\Lugar;

class EstablecimientoController extends Controller
{
    //
     public function index(){
        //$establecimientos = Establecimiento::all();
        $establecimiento = Establecimiento::where('estado', '=', 'activo')
            ->get()
            ->all();

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


    public function borrados(){
        $establecimiento = Establecimiento::where('estado', '=', 'inactivo')
            ->get()
            ->all();

        /*
        if( Auth::check() ){
            $user = User::find(Auth::user()->id);
            $areas = Area::all();
            $establecimientos = Establecimiento::all();
            $lugares = Lugar::all();
            if ( $user->idrol === 2 || $user->idrol === 3) {      
                $funcionario = Funcionario::where('user_id', $user->id)
                    ->first();
                $establecimientos = Establecimiento::where('funcionario_id', $funcionario->id)
                    ->where('estado', '=', 'inactivo')
                    ->orderBy('created_at', 'DESC')->get()->all();

               return view('establecimiento.borrados', [
                    'areas' => $areas,
                    'user' => Auth::user(),
                    'establecimientos' => $establecimientos,
                    'establecimientos' => $establecimientos,
                    'lugares' => $lugares,
                ]);
            } else {
                return redirect()->to('/busqueda');
            }
        }
        return redirect()->to('/');
        */
        return view('establecimiento.borrados', [
            //'areas' => $areas,
            //'user' => Auth::user(),
            //'establecimientos' => $establecimientos,
            'establecimientos' => $establecimientos,
            //'lugares' => $lugares,
        ]);
    }

    public function recuperar($id){
         $establecimiento = Establecimiento::find($id);
         //return $establecimiento;
            $establecimiento->update([
                'estado' => 'activo',
            ]);

        Session::flash('mensaje', 'Establecimiento recuperado');
        return Redirect::to('publicacion/borrados');
    }

    public function destroy($id){
    	//return "destroy";
        /*
        Establecimiento::destroy($id);

        Session::flash('mensaje', 'Establecimiento Eliminado');
        return Redirect::to('establecimiento');
        */
         $establecimiento = Establecimiento::find($id);
            $establecimiento->update([
                'estado' => 'inactivo',
            ]);
            //$establecimiento->estado = 'inactivo';
            //return $establecimiento;

        Session::flash('mensaje', 'Establecimiento borrado');
        return Redirect::to('establecimiento');
    }
}
