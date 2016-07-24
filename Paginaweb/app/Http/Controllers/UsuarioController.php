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
use Log;
use DB;

class UsuarioController extends Controller
{

    public function __construct(){

        $this->middleware('auth', ['except' => ['store']]);
        $this->middleware('admin', ['only' => ['create', 'index', 'edit', 'store','destroy']]);

        //$this->middleware('usuario', ['except' => ['update']]);
        //$this->middleware('funcionario', ['except' => ['update']]);    

        //$this->middleware('docente', ['except' => ['update']]);
        //$this->middleware('funcionario', ['except' => ['update']]);
        //$this->middleware('funcionario', ['except', 'store']);
        //$this->middleware('guest', ['only' => ['create']]);
    }
    //
    public function index(){
    	//return "index de usuario";
    	//$usuarios = User::all();
        $usuarios = User::where('id', '!=', Auth::user()->id)
            ->where('estado', '=', 'activo')
            ->get()
            ->all();

        //$user = Auth::user();
        //echo "entro";
    	return view('usuario.index', [
            //'usuarios' => $usuarios,
            'usuarios' => $usuarios,
            'user' => Auth::user(),
        ]);
    }

    public function create(){
        //echo"entro";
        $areas = Area::all();
        $establecimientos = Establecimiento::all();
    	return view('usuario.create')->with([
            'areas'=> $areas,
            'establecimientos'=> $establecimientos,
            'user' => Auth::user(),
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
        } else {
            //return view('usuario.edit')
        }

    }

    //public function store(UserCreateRequest $request){
   public function store(Request  $request){
        //return "Establecimiento " .$request['establecimiento'];
       //echo $request['email;'];    
       dd($request['areas']);
       return ""; 
        $rol = $request['rol'];
        if($rol === "docente"){
            $notificar = $request['notificar'];
            if ($notificar === NULL) {
                $notificar = 1;
            } else{
                $notificar = 0;
            }        
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'],
                'idrol' => 1,
                'estado' => 'activo',
            ]);
            $docente = Docente::create([
                'user_id' => $user->id,
                'notificar' => $notificar,
            ]);

            $this->crear_interes($docente, $request);
             AdminController::enviar_correo('emails.welcome',$user,'Bienvenido');
        } elseif($rol == "funcionario") {
            //return "EStaba " .$request['establecimiento'];
            $establecimientos = Establecimiento::all();
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'],
                'idrol' => 2,
                'estado' => 'inactivo',
            ]);
            Funcionario::create([
                'user_id' => $user->id,
                'establecimiento_id' => $request['establecimiento'],
            ]);
            //AdminController::enviar_correo('emails.welcome',$user,'Bienvenido');
            AdminController::enviar_correo('emails.aviso_activado',$user,'Bienvenido la actualización de tu cuenta esta proceso');
        }

        if(!Auth::check()){
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
        } else if(Auth::user()->idrol == 3){
            //return Redirect::to('/lgjalgaljgñasjga');
            return Redirect::to('/usuario');
        }

        //Session::flash('mensaje-error', 'Datos incorrectos');
        //return Redirect::to('/');        
        
    }

    public function crear_interes($docente, Request $request){
        $areas = $request['areas'];
        if(!empty($areas)){
            foreach ($areas as $area) {
                Interes::create([
                    'docente_id' => $docente->id,
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

        $usuario_editar = User::find($id);
        /*
        if ($usuario_editar->idrol == 3) {
            //$usuario_editar = Auth::user();
            return "editar admin";
        } else {
            return "editar otro";
        }
        */
        //return "email " . $request['email'];

        //return $id;
        if ($usuario_editar->email == $request['email']) {
            $this->validate($request, [
                'name' => 'required',
                //'email' => 'required|email|unique:users',
                'email' => 'required|email',
            ]);
            return $this->actualizar_usuario($usuario_editar, $request);
        } else {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
            ]);
            return $this->actualizar_usuario($usuario_editar, $request);
        }
    }

    public function actualizar_usuario($user, Request $request){
        //$user = User::find($id);
        if ($user->idrol == 1) {
            $notificar = $request['notificar'];
            if ($notificar === NULL) {
                $notificar = 1;
            } else{
                $notificar = 0;
            }

            //$docente = Docente::where('user_id', '=', $user->id)->first();

            //return $user;
            $docente=DB::table('docentes')->where('user_id','=',$user->id)->first();            
            $intereses = Interes::where('docente_id',$docente->id )->delete();
            
            $this->crear_interes($docente, $request); 

            $docente = Docente::where('user_id', $user->id);
            $docente->update([
                'notificar' => $notificar,
            ]);
        } elseif ($user->idrol == 2) {
            $funcionario = Funcionario::where('user_id', $user->id);
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
        if (Auth::user()->idrol == 3) {
            $actualizar = array(
                'user' => $user,
                'usuario' => Auth::user(),
                );
            return Response::json($actualizar);            
        } else {
            $actualizar = array(
                'user' => $user,
                //'usuario' => Auth::user(),
            );
            return Response::json($actualizar);
        }
       

        /*
        return [
            'user' => $user,
            'usuario' => Auth::user(),
        ];
        */

    }


    public function borrados(){
        $usuarios = User::where('id', '!=', Auth::user()->id)
            ->where('estado', '=', 'inactivo')
            ->get()
            ->all();

        return view('usuario.borrados', [
            'usuarios' => $usuarios,
            'user' => Auth::user(),
        ]);
        /*
        if( Auth::check() ){
            $user = User::find(Auth::user()->id);
            $areas = Area::all();
            $establecimientos = Establecimiento::all();
            $lugares = Lugar::all();
            if ( $user->idrol === 2) {      
                $funcionario = Funcionario::where('user_id', $user->id)
                    ->first();
                $usuarios = Publicacion::where('funcionario_id', $funcionario->id)
                    ->where('estado', '=', 'inactiva')
                    ->orderBy('created_at', 'DESC')->get()->all();

               return view('publicacion.borrados', [
                    'areas' => $areas,
                    'user' => Auth::user(),
                    'usuarios' => $usuarios,
                    'establecimientos' => $establecimientos,
                    'lugares' => $lugares,
                ]);
            } else if($user->idrol === 3){
                return redirect()->to('publicacion/borrados');
            }else {
                return redirect()->to('/busqueda');
            }
        }
        return redirect()->to('/');
        */
    }

    public function recuperar($id){
         $usuario = User::find($id);
         //return $usuario;
            $usuario->update([
                'estado' => 'activo',
            ]);

        Session::flash('mensaje', 'Usuario recuperado');
        return Redirect::to('usuario/borrados');
    }


    public function destroy($id){
        /*
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
        */

        $usuario = User::find($id);
        $usuario->update([
            'estado' => 'inactivo',
        ]);


        Session::flash('mensaje', 'Usuario Inactivado');
        return Redirect::to('usuario');
    }
}
