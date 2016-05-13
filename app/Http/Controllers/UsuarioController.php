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

class UsuarioController extends Controller
{
    //
    public function index(){
    	//return "index de usuario";
    	$users = User::all();
    	return view('usuario.index', compact('users'));
    }

    public function create(){
        $areas = Area::all();
    	return view('usuario.create')->with('areas', $areas);
    }

    public function store(UserCreateRequest $request){
        $notificar = $request['notificar'];
        //echo "notificar vale: " .$notificar;
        if ($notificar === NULL) {
            //echo "if ".$notificar;
            $notificar = 1;
        } else{
            //echo "else ".$notificar;
            $notificar = 0;
        }
        
        //echo "3 " .$notificar;

    	$usuario = User::create([
    		'name' => $request['name'],
    		'email' => $request['email'],
    		'password' => $request['password'],
            'notificar' => $notificar,
		]);
        $this->crear_areas($usuario, $request);

        Session::flash('mensaje', 'Usuario creado');
        return Redirect::to('usuario');        
    }

    public function crear_areas($usuario, Request $request){
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
        $areas = Area::all();
        $intereses = Interes::where('user_id', $id)->get();
        $areas_usuario = array();
        foreach ($intereses as $interes) {
            $areas_usuario[] = $interes->area_id;
        }
        return view('usuario.edit', [
            'user' => $user,
            'areas' => $areas,
            'areas_usuario' => $areas_usuario,
        ]);        
    }

    public function update($id, UserUpdateRequest $request){
        //echo $request;
        $notificar = $request['notificar'];
        if ($notificar === NULL) {
            $notificar = 1;
        } else{
            $notificar = 0;
        }
        $user = User::find($id);
        $user->fill($request->all());
        $user->notificar = $notificar;
        $user->save();


        $areas = Interes::where('user_id', $id)->delete();
        $this->crear_areas($user, $request);

        /*
        $areas = $request['areas'];


        $inter = array();
        foreach ($user->interes as $interes) {
            $inter[] = $interes->area_id;
        }

        foreach ($areas as $area) {
            if(!in_array($area, $inter)){
                //echo "NO: " .$area;
                Interes::create([
                    'user_id' => $id,
                    'area_id' => $area,
                ]);
            } else {
                //echo "SI: " .$area;
            }
        }
        */

        Session::flash('mensaje', 'Usuario Editado');
        return Redirect::to('usuario');
    }

    public function destroy($id){
        User::destroy($id);

        Session::flash('mensaje', 'Usuario Eliminado');
        return Redirect::to('usuario');
    }
}
