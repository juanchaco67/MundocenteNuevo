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
                    ->select('publicaciones.nombre', 'publicaciones.descripcion')
                    ->orderBy('fecha_publicacion', 'DESC')
                    ->distinct()
                    ->get();
                $areas = Area::all();
                $establecimientos = Establecimiento::all();

                return $this->cargar_preferencias($areas, $establecimientos, $mezcla);
                /*
                return view('docente.index')->with([
                    'publicaciones' => $mezcla,
                ]);
                */
                
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
                return redirect()->to('/');            
            }
            

        } else {
            return redirect()->to('/');            
        }

    }

    public function create(){
        //return "create";
        return view('publicacion.create');
        //return "index";
    }

    public function store(Request $request){
        //echo "Buscar ".$request['valor'];
        if(!empty($request['campo'])){
            $publicaciones = Publicacion::where('nombre', 'like', '%'.$request['campo'].'%')
            ->orwhere('descripcion', 'like', '%'.$request['campo'].'%')
            ->orderBy('fecha_publicacion', 'DESC')
            ->get();            
        } else {
            $publicaciones = Publicacion::orderBy('fecha_publicacion', 'DESC')
                ->get();
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
            return view('index')->with([
            'areas'=> $areas,
            'establecimientos'=> $establecimientos,
            'publicaciones' => $publicaciones,
            ]);
        }


    }

    public function show($tipo){
        $publicaciones = Publicacion::where('tipo', '=', $tipo)
            ->orderBy('fecha_publicacion', 'DESC')
            ->get();
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
            return view('index')->with([
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
            if($user->idrol == 1){ 
                $areas = Area::all();
                $intereses = Interes::where('docente_id', $user->id)->get();
                $areas_usuario = array();
                foreach ($intereses as $interes) {
                    $areas_usuario[] = $interes->area_id;
                }

                //$user->docente->notificar = $notificar;

                return view('index', [
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
                return view('index', [
                    'areas'=> $areas,
                    'establecimientos'=> $establecimientos,
                    'user'=>$user,
                    'publicaciones' => $publicaciones,
                ]);        
            }
    }
}
