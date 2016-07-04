<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Area;
use App\Lugar;
use App\Publicacion;
use App\Interes;
use App\Establecimiento;
use Auth;
use Mail;
class AdminController extends Controller
{
    public function __construct(){
       $this->middleware('auth');
       $this->middleware('admin');
    }
   
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        /*
        $users = User::all();
        $areas = Area::all();
        $lugares = Lugar::all();
        $publicaciones = Publicacion::all();
        $establecimientos = Establecimiento::all();
        */
        //$usuarios = User::all();
        $pendientes = User::where('estado', 'inactivo')->get()->all();
        return view('admin.index', [
            'user' => Auth::user(),
            'pendientes' => $pendientes,
            //'usuarios' => $usuarios,
            /*
            'users' => $users,
            'areas' => $areas,
            'lugares' => $lugares,
            'publicaciones' => $publicaciones,
            'establecimientos' => $establecimientos,
            */
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        if ($id == "docentes") {
            return view('docentes.index')->with([
                'docentes' => User::all(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit($id){
        $usuario = User::find($id);    
        /*  
        return view('usuario.edit', [
            'usuario' => $usuario,
            'user' => Auth::user(),
        ]);   
        */

        $user = Auth::user();


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
                'user' => $user,
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
                'user' => $user,
                'usuario' => $usuario,
                'establecimientos' => $establecimientos,
            ]);        
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    public function listar_docentes(){
        $docentes = User::where('idrol', '=', 1)->get();
        return view('admin.docentes')->with([
            'docentes' => $docentes,
        ]);
    }

    public function listar_publicadores(){
        $publicadores = User::where('idrol', '=', 2)->get();
        return view('admin.publicadores')->with([
            'publicadores' => $publicadores,
        ]);
    }

    public function listar_publicaciones(){
        $publicaciones = Publicacion::all();
        return view('admin.publicaciones')->with([
            'publicaciones' => $publicaciones,
        ]);
    }

    public function listar_establecimientos(){
        $establecimientos = Establecimiento::all();
        return view('admin.universidades')->with([
            'universidades' => $establecimientos,
        ]);
    }
    public function enviar_correo($vista,$correo,$msj){

        $data = array(
            'name' => "Mundocente",
        );
        Mail::send($vista, $data, function ($message) as ($correo,$msj) {
            $message->from('software.grupo2.uptc.colombia@gmail.com', 'Mundocente');
            $message->to($correo)->subject(msj);
        });
    }
}
