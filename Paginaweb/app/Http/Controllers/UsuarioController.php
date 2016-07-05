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
use Auth;
use App\Http\Controllers\AdminController;
use Response;
use Validator;

class UsuarioController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['store']]);
        //$this->middleware('usuario', ['except' => ['update']]);
        //$this->middleware('funcionario', ['except' => ['update']]);    

        //$this->middleware('docente', ['except' => ['update']]);
        //$this->middleware('funcionario', ['except' => ['update']]);
        //$this->middleware('funcionario', ['except', 'store']);
        $this->middleware('admin', ['only' => ['create', 'index', 'edit', 'store','destroy']]);
        //$this->middleware('guest', ['only' => ['create']]);
    }
    //
    public function index(){
    	//return "index de usuario";
    	$usuarios = User::all();
        $user = Auth::user();
        //echo "entro";
    	return view('usuario.index', [
            //'usuarios' => $usuarios,
            'usuarios' => $usuarios,
            'user' => $user,
        ]);
    }

    public function create(){
        //echo"entro";
        $areas = Area::all();
        $establecimientos = Establecimiento::all();
    	return view('usuario.create')->with([
            'areas'=> $areas,
            'establecimientos'=> $establecimientos,
        ]);
    }


    public function edit($id){
        //return "edit usuario" .$id;
        $usuario = User::find($id);
        //$usuario = Auth::usuario();
        //return $usuario;
      
        if($usuario->idrol === 1){
            //return "editar " .$usuario;
       
            $areas = Area::all();
            $intereses = Interes::where('docente_id', $id)->get();
            $areas_usuario = array();
            foreach ($intereses as $interes) {
                $areas_usuario[] = $interes->area_id;
            }

            //$usuario->docente->notificar = $notificar;

            return view('usuario.edit', [
                //'user' => $user,
                'usuario' => $usuario,
                'areas' => $areas,
                'areas_usuario' => $areas_usuario,
            ]);   
             //echo $usuario;     
        } elseif($usuario->idrol === 2){
            //return "editar " .$usuario;
            $establecimientos = Establecimiento::all();
            return view('usuario.edit', [
                //'usuario' => $usuario,
                'usuario' => $usuario,
                'establecimientos' => $establecimientos,
            ]);        
        }

    }

    public function store(UserCreateRequest $request){
        //return "Establecimiento " .$request['establecimiento'];
       //echo $request['email;'];

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
            $docente = Docente::create([
                'user_id' => $usuario->id,
                'notificar' => $notificar,
            ]);

            $this->crear_interes($docente, $request);
             AdminController::enviar_correo('emails.welcome',$usuario,'Bienvenido');
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
                 AdminController::enviar_correo('emails.aviso_activado',$usuario,'Bienvenido la actualización de tu cuenta esta proceso');
        }

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            //return Redirect::to('/');
            //return "hola".$request['name'];        
                Session::flash('mensaje', 'Bienvenido a Mundocente ' . $request['name']);
           if (Auth::user()->idrol === 1) {
                return Redirect::to('/');
            } elseif (Auth::user()->idrol === 2) {
                return Redirect::to('/publicacion');
            }
            
        }
        //Session::flash('mensaje-error', 'Datos incorrectos');
        //return Redirect::to('/');        
        
    }

    public function crear_interes($usuario, Request $request){
        $areas = $request['areas'];
        if(!empty($areas)){
            foreach ($areas as $area) {
                Interes::create([
                    'docente_id' => $usuario->id,
                    'area_id' => $area,
                ]);
            }            
        }
    }

    public function show($id){
    	//return "show usuario" .$id;
        return Redirect::to('/');
    }

    

    public function update($id, Request $request){
        //echo $request;
            if (Auth::user()->email == $request['email']) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    //'email' => 'required|email|unique:users',
                    'email' => 'required|email',
                ]);

                if ($validator->fails()) {
                    return $validator->messages()->toJson();
                } else {
                    $this->actualizar_usuario($id, $request);
                }
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                ]);
                if ($validator->fails()) {
                    return $validator->messages()->toJson();
                } else {
                    $this->actualizar_usuario($id, $request);
                }
            }
    }

    public function actualizar_usuario($id, Request $request){
        $user = User::find($id);
        if ($user->idrol ==1) {
            $notificar = $request['notificar'];
            if ($notificar === NULL) {
                $notificar = 1;
            } else{
                $notificar = 0;
            }

            //$docente = Docente::where('user_id', '=', $user->id)->first();

            //return $user;
            $areas = Interes::where('docente_id', $id)->delete();
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
            if ($user->estado == "inactivo") {
             AdminController::enviar_correo('emails.aviso_activado',$user,'Tu nueva cuenta esta haciendo verificada');
            } else {
                //echo "no enviarnada";
            }
        } else {
            $user->update(['estado' => 'activo']);
        }
    
        Session::flash('mensaje', 'Usuario Editado');
       
        $actualizar = array(
            'user' => $user,
            'usuario' => Auth::user(),
        );
        return Response::json($actualizar);
        /*
        return [
            'user' => $user,
            'usuario' => Auth::user(),
        ];
        */

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
