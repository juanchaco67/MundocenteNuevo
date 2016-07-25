<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EstablecimientoUpdateRequest;
use App\Establecimiento;
use Session;
use Redirect;
use Auth;
use App\User;
use App\Area;
use App\Lugar;
use App\Funcionario;

class EstablecimientoController extends Controller
{
    //
     public function index(){
        //$establecimientos = Establecimiento::all();
        $establecimientos = Establecimiento::where('estado', '=', 'activo')
            ->paginate(15);
            //->get()->all();

        return view('establecimiento.index', [
            'establecimientos' => $establecimientos,
            'user' => Auth::user(),

        ]);



        /*
        $establecimientoes = establecimiento::where('nombre', 'like', '%'.$valor.'%')
          ->orwhere('descripcion', 'like', '%'.$valor.'%')->get();
        return view('establecimiento.index')->with('establecimientoes', $establecimientoes);
        return $valor;
        */
    }

    public function create(){
        //return "create";
        return view('establecimiento.create', [
            'user' => Auth::user(),

        ]);
        //return "index";
    }

    public function store(EstablecimientoUpdateRequest $request){
        //return "store";
        Establecimiento::create([
            //'nombre' => $request['nombre'],
            'nombre' => $request['nombre'],
        ]);

        Session::flash('mensaje', 'Establecimiento creado');
        return Redirect::to('establecimiento');        
    }

    public function show($id){
        //return "show";
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

    public function update($id, EstablecimientoUpdateRequest $request){
        //return "update";
        $establecimiento = Establecimiento::find($id);
        $establecimiento->fill($request->all());
        $establecimiento->save();

        Session::flash('mensaje', 'Establecimiento Editado');
        return Redirect::to('establecimiento');
    }


    public function borrados(){
        $establecimientos = Establecimiento::where('estado', '=', 'inactivo')
            ->paginate(15);
            //->get()->all();

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
            'user' => Auth::user(),

            //'lugares' => $lugares,
        ]);
    }

    public function recuperar($id){
        $funcionarios = Funcionario::where('establecimiento_id', $id)
            ->get()
            ->all();
        foreach ($funcionarios as $funcionario) {
            $funcionario->user->update([
                'estado' => 'activo',
            ]);            
        }

        $establecimiento = Establecimiento::find($id);
         //return $establecimiento;
            $establecimiento->update([
                'estado' => 'activo',
            ]);

        Session::flash('mensaje', 'Establecimiento recuperado');
        return Redirect::to('establecimiento/borrados');
    }

    public function destroy($id){
    	//return "destroy";
        /*
        Establecimiento::destroy($id);

        Session::flash('mensaje', 'Establecimiento Eliminado');
        return Redirect::to('establecimiento');
        */

        $funcionarios = Funcionario::where('establecimiento_id', $id)
            ->get()
            ->all();
        foreach ($funcionarios as $funcionario) {
            $funcionario->user->update([
                'estado' => 'inactivo',
            ]);            
        }

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
