<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Session;
use Redirect;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Area;
use App\Interes;
use Illuminate\Support\Facades\Input;
use App\Establecimiento;
use App\Docente;
use App\Funcionario;

class UsuarioController extends Controller
{
    //
    public function index(){
    	//return "index de usuario";
    	$users = User::all();
        echo "entro";
    	return view('usuario.index', compact('users'));
    }

    public function create(){
        $areas = Area::all();
        $establecimientos = Establecimiento::all();
    	return view('usuario.create')->with([
            'areas'=> $areas,
            'establecimientos'=> $establecimientos,
        ]);
    }

    public function store(UserCreateRequest $request){
        //return "Establecimiento " .$request['establecimiento'];
        $rol = $request['rol'];
        if($rol === "docente"){
            $notificar = $request['notificar'];
            if ($notificar === NULL) {
                $notificar = 1;
            } else{
                $notificar = 0;
            }        
            $usuario = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'],
                'idrol' => 1,
                'estado' => 'activo',
            ]);
            Docente::create([
                'user_id' => $usuario->id,
                'notificar' => $notificar,
            ]);
            $this->crear_interes($usuario, $request);
        } elseif($rol == "funcionario") {
            //return "EStaba " .$request['establecimiento'];
            $establecimientos = Establecimiento::all();
            $usuario = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'],
                'idrol' => 2,
                'estado' => 'inactivo',
            ]);
            Funcionario::create([
                'user_id' => $usuario->id,
                'establecimiento_id' => $request['establecimiento'],
            ]);
        }

        Session::flash('mensaje', 'Usuario creado');
        return Redirect::to('usuario');        
        
    }

    public function crear_interes($usuario, Request $request){
        $areas = $request['areas'];
        if(!empty($areas)){
            foreach ($areas as $area) {
                Interes::create([
                    'user_id' => $usuario->id,
                    'area_id' => $area,
                ]);
            }            
        }
    }

    public function show($id){
    	return "show usuario" .$id;
    }

    public function edit($id){
    	//return "edit usuario" .$id;

        $user = User::find($id);
        //return $user;
      
        if($user->idrol == 1){
            //return "editar " .$user;
       
            $areas = Area::all();
            $intereses = Interes::where('user_id', $id)->get();
            $areas_usuario = array();
            foreach ($intereses as $interes) {
                $areas_usuario[] = $interes->area_id;
            }

            //$user->docente->notificar = $notificar;

            return view('usuario.edit', [
                'user' => $user,
                'areas' => $areas,
                'areas_usuario' => $areas_usuario,
            ]);   
             echo $user;     
        } elseif($user->idrol === 2){
            //return "editar " .$user;
            $establecimientos = Establecimiento::all();
            return view('usuario.edit', [
                'user' => $user,
                'establecimientos' => $establecimientos,
            ]);        
        }

    }

    public function update($id, UserUpdateRequest $request){
        //echo $request;

        $user = User::find($id);
        if ($user->idrol ==1) {
            $notificar = $request['notificar'];
            if ($notificar === NULL) {
                $notificar = 1;
            } else{
                $notificar = 0;
            }

            $areas = Interes::where('user_id', $id)->delete();
            $this->crear_interes($user, $request); 

            $docente = Docente::where('user_id', $id);
            $docente->update([
                'notificar' => $notificar,
            ]);
        } elseif ($user->idrol == 2) {
            $funcionario = Funcionario::where('user_id', $id);
            $funcionario->update([
                'establecimiento_id' => $request['establecimiento'],
            ]);
        }

        $user->fill($request->all());
        $user->save();

        if ($request['desactivar']) {
            $user->update(['estado' => 'inactivo']);
        } else {
            $user->update(['estado' => 'activo']);
        }

        Session::flash('mensaje', 'Usuario Editado');
        return $user;
    }

    public function destroy($id){
        $usuario = User::find($id);
        if ($usuario->rol == 1) {
            //echo "Destruir docente";
            Docente::destroy($id);
            Interes::where('user_id', $id)->delete();
        } elseif($usuario->rol == 2){
            //echo "Destruir funcionario";
            Funcionario::destroy($id);
        }

        User::destroy($id);

        Session::flash('mensaje', 'Usuario Eliminado');
        return Redirect::to('usuario');
    }
}
