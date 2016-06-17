<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Publicacion;
use App\User;
use Auth;
use App\Interes;
use App\Grupo;
use App\Area;
use App\Docente;
use App\Establecimiento;
use App\Funcionario;
use DB;

class BuscadorController extends Controller
{
    //
    public function index(){
        //$publicaciones = Publicacion::all();
        //return view('publicacion.index', compact('publicaciones'));
        //$user = User::where('id', Auth::user()->id);
        if(Auth::check()){
            if(Auth::user()->idrol == 1){
                $docente = Docente::where('user_id', Auth::user()->id)->first();
                $mezcla = DB::table('docentes')
                    ->where('user_id', Auth::user()->id)
                    ->join('intereses', 'intereses.docente_id', '=', 'docentes.id')
                    ->join('areas', 'areas.id', '=', 'intereses.area_id')
                    ->join('grupos', 'grupos.area_id', '=', 'areas.id')
                    ->join('publicaciones', 'publicaciones.id', '=', 'grupos.publicacion_id')                    
                    ->select('publicaciones.id', 'publicaciones.funcionario_id', 'publicaciones.nombre', 'publicaciones.resumen', 'publicaciones.descripcion', 'publicaciones.tipo', 'publicaciones.created_at')
                    ->orderBy('created_at', 'DESC')
                    ->distinct()
                    ->get();
                    //return var_dump($mezcla->"nombre");

                    //return $mezcla;
                    $mett = array();
                    foreach ($mezcla as $me) {
                        $mett[] = $me->id;
                    }

                    //return $mett;


                    $publicaciones = array();
                    foreach ($mezcla as $mez) {
                        //echo $mez->id;
                        //echo Publicacion::find($mez->id);
                        $publicaciones[] = Publicacion::find($mez->id);;
                    }
                    //return $publicaciones;
                    //$publicaciones = $mezcla->
                    //$areas = Area::all();
                    //$funcionarios = Funcionario::where('id', $mezcla->funcionario_id);
                    /*$establecimientos = Establecimiento::where('id', $funcionarios->);

                    return $this->cargar_preferencias($areas, $establecimientos, $mezcla);
                    return $mezcla;
                    */
                    /*
                    $funcionarios = array();
                    foreach ($mezcla as $mez) {
                        $funcionarios[] = Funcionario::find($mez->funcionario_id)->get();
                        //$establecimiento = $funcionario->establecimiento;
                        //echo $funcionarios;
                    }
                    */

                    //return $funcionarios;
                    /*

                    $mezcla2 = DB::table('docentes')
                        ->where('user_id', Auth::user()->id)
                        ->join('intereses', 'intereses.docente_id', '=', 'docentes.id')
                        ->orderBy('user_id', 'DESC')
                        ->distinct()
                        ->get();

                        //echo $mezcla2;
                    return $mezcla2;
                $areas = Area::all();
                $establecimientos = Establecimiento::all();

                return $this->cargar_preferencias($areas, $establecimientos, $mezcla);
                */
                $areas = Area::all();
                $establecimientos = Establecimiento::all();
                return $this->cargar_preferencias($areas, $establecimientos, $publicaciones);
                
                return view('reviews')->with([
                    'publicaciones' => $publicaciones,
                    
                ]);
                
                
                /*
                foreach ($mezcla as $mez) {
                    echo $mez->publicacion_id;
                }
                return "fin";
                */

                
                //$intereses->
                //return $grupos;
                //$publicaciones = Publicacion::where('');
                //return $intereses;
            } else {
                //return  "funcio";

               return view('index', [
                ]);              
            }

        } else {
            return redirect()->to('/')->with([
            ]);            
        }

    }

    public function create(){
        //return "create";
        //return view('publicacion.create');
        //return "index";
    }

    public function store(Request $request){
        //echo "Buscar ".$request['valor'];
        if(!empty($request['campo'])){
            $publicaciones = Publicacion::where('nombre', 'like', '%'.$request['campo'].'%')
            ->orwhere('resumen', 'like', '%'.$request['campo'].'%')
            ->orwhere('descripcion', 'like', '%'.$request['campo'].'%')
            ->orwhere('tipo', 'like', '%'.$request['campo'].'%')
            ->orderBy('created_at', 'DESC')
            ->get();            
        } else {
            //$publicaciones = Publicacion::orderBy('created_at', 'DESC')
            $publicaciones = array();
               //->get();
        }
        /*return view('index')->with([
                'publicaciones' => $publicaciones,
        ]);
        */        

        $areas = Area::all();       
        $establecimientos = Establecimiento::all();
        if(Auth::check()){
//            echo "hola";
            return $this->cargar_preferencias($areas, $establecimientos, $publicaciones);


            /*
            return view('index')->with([
            'areas'=> $areas,
            'establecimientos'=> $establecimientos,
            'user'=>$user,
            'publicaciones' => $publicaciones,
            ]);
            */
        } else {
            //return $publicaciones;
            return view('reviews')->with([
                'areas'=> $areas,
                'establecimientos'=> $establecimientos,
                'publicaciones' => $publicaciones,
            ]);
        }


    }

    public function show($tipo){
        $publicaciones = Publicacion::where('tipo', '=', $tipo)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->all();
        //return $publicaciones->get();

            /*
        return view('index')->with([
                'publicaciones' => $publicaciones,
        ]); 
        */

        $areas = Area::all();       
        $establecimientos = Establecimiento::all();
        if(Auth::check()){
            return $this->cargar_preferencias($areas, $establecimientos, $publicaciones);
            /*
            $user = User::find(Auth::user()->id);
            return view('index')->with([
            'areas'=> $areas,
            'establecimientos'=> $establecimientos,
            'user'=>$user,
            'publicaciones' => $publicaciones,
            ]);
            */
        } else {
            return view('reviews')->with([
                'areas'=> $areas,
                'establecimientos'=> $establecimientos,
                'publicaciones' => $publicaciones,
            ]);
        }
    }

    public function cargar_preferencias($areas, $establecimientos, $publicaciones){
        //return "hohohoh";
            $user = User::find(Auth::user()->id);
            //return $user;
            //return $publicaciones;
            if($user->idrol === 1){ 
                $areas = Area::all();
                $intereses = Interes::where('docente_id', $user->id)->get();
                $areas_usuario = array();
                foreach ($intereses as $interes) {
                    $areas_usuario[] = $interes->area_id;
                }

                //$user->docente->notificar = $notificar;

                return view('reviews', [
                    'areas'=> $areas,
                    'establecimientos'=> $establecimientos,
                    'user'=>$user,
                    'publicaciones' => $publicaciones,
                    'areas_usuario' => $areas_usuario,
                ]);   
             //echo $user;     
            } elseif($user->idrol === 2){
                //return "editar " .$user;

                $establecimientos = Establecimiento::all();
                return view('reviews', [
                    'areas'=> $areas,
                    'establecimientos'=> $establecimientos,
                    'user'=>$user,
                    'publicaciones' => $publicaciones,
                ]);        
            }
    }
}
