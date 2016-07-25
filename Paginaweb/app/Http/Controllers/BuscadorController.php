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
use App\Aplica;
use App\Lugar;
use Illuminate\Support\Facades\Input;
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
                $funcionarios = Funcionario::all();
                $id_funcionarios = array();
                foreach ($funcionarios as $funcionario) {
                    if ($funcionario->user->estado == 'activo') {
                        $id_funcionarios[] += $funcionario->id;
                    }
                }
                $mezcla = DB::table('docentes')
                    ->where('user_id', Auth::user()->id)
                    ->join('intereses', 'intereses.docente_id', '=', 'docentes.id')
                    ->join('areas', 'areas.id', '=', 'intereses.area_id')
                    ->join('grupos', 'grupos.area_id', '=', 'areas.id')
                    ->join('publicaciones', 'publicaciones.id', '=', 'grupos.publicacion_id')
//                    ->where('estado', '=', 'activa')
                    ->select('publicaciones.id', 'publicaciones.funcionario_id', 'publicaciones.nombre', 'publicaciones.resumen', 'publicaciones.descripcion', 'publicaciones.tipo', 'publicaciones.fecha_publicacion')
                    ->where('estado', '=', 'activa')
                    ->whereIn('funcionario_id', $id_funcionarios)
                    //->orderBy('created_at', 'DESC')
                    ->orderBy('fecha_publicacion', 'DESC')
                    ->distinct()
                    ->get();
                    //return var_dump($mezcla->"nombre");

                    $idpublicaciones = array();
                    foreach ($mezcla as $mez) {
                        //$publicaciones[] = Publicacion::find($mez->id);
                        $idpublicaciones[] = $mez->id;
                    }

                    $publicaciones = Publicacion::whereIn('id', $idpublicaciones)->get();
                    
                return $this->cargar_preferencias($publicaciones);
                
             
            } else {
             
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



    public function filtrarTipo($tipos, $publicaciones){
        $publicaciones = $publicaciones->whereIn('tipo', $tipos);
        return $publicaciones;
    }

    public function filtrarArea($areas, $publicaciones){
        $grupos = Grupo::whereIn('area_id', $areas)->get();
        $idpublicaciones = array();
        foreach ($grupos as $grupo) {
            $idpublicaciones[] = $grupo->publicacion_id;
        }
        $publicaciones = $publicaciones->whereIn('id', $idpublicaciones);
        return $publicaciones;
    }

    public function filtrarLugar($lugares, $publicaciones){
        $publicaciones = $publicaciones->whereIn('lugar_id', $lugares);
        return $publicaciones;
    }

    public function filtrarEstablecimiento($establecimientos, $publicaciones){
        $funcionarios = Funcionario::whereIn('establecimiento_id', $establecimientos)->get();
        $idfuncionarios = array();
        foreach ($funcionarios as $funcionario) {
            $idfuncionarios[] = $funcionario->id;
        }
        $publicaciones = $publicaciones->whereIn('funcionario_id', $idfuncionarios);
        return $publicaciones;
    }


    public function store(Request $request){
        $campo = Input::get('campo');
        $tipos = Input::get('tipos');
        $areas = Input::get('areas');
        $lugares = Input::get('lugares');
        $establecimientos = Input::get('establecimientos');

        /*
        $publicaciones = Publicacion::where(function($query) use ($campo){
            $query->where('nombre', 'like', '%'.$campo.'%')
            ->orwhere('resumen', 'like', '%'.$campo.'%')
            ->orwhere('descripcion', 'like', '%'.$campo.'%')
            ->orderBy('created_at', 'DESC');
        })->get();
        */
        if(!empty($campo)){
            $idpublicaciones = array();

            $publicaciones = $this->buscar_por_establecimiento($campo);
            foreach ($publicaciones as $publicacion) {
                $idpublicaciones[] = $publicacion->id;
            }
            $publicaciones = $this->buscar_por_lugar($campo);
            foreach ($publicaciones as $publicacion) {
                $idpublicaciones[] = $publicacion->id;
            }
            $publicaciones = $this->buscar_por_area($campo);
            foreach ($publicaciones as $publicacion) {
                $idpublicaciones[] = $publicacion->id;
            }

            $publicaciones = Publicacion::where(function($query) use ($campo, $idpublicaciones) {
                $query->whereIn('id', $idpublicaciones)
                //->where('estado', '=', 'activa')
                ->orwhere('nombre', 'like', '%'.$campo.'%')
                ->orwhere('resumen', 'like', '%'.$campo.'%')
                ->orwhere('descripcion', 'like', '%'.$campo.'%')
                ->orwhere('tipo', 'like', '%'.$campo.'%');
            });


            if ($tipos) {
                $publicaciones = $this->filtrarTipo($tipos, $publicaciones);
                if ($areas) {
                    $publicaciones = $this->filtrarArea($areas, $publicaciones);
                }
                if ($lugares) {
                    $publicaciones = $this->filtrarLugar($lugares, $publicaciones);   
                }
                if ($establecimientos) {
                    $publicaciones = $this->filtrarEstablecimiento($establecimientos, $publicaciones);   
                }
            }

            if ($areas) {
                $publicaciones = $this->filtrarArea($areas, $publicaciones);
                if ($lugares) {
                    $publicaciones = $this->filtrarLugar($lugares, $publicaciones);
                }
                if ($establecimientos) {
                    $publicaciones = $this->filtrarEstablecimiento($establecimientos, $publicaciones);   
                }
            }


            if ($lugares) {
                $lugares = $this->filtrarLugar($lugares, $publicaciones);
                if ($establecimientos) {
                    $publicaciones = $this->filtrarEstablecimiento($establecimientos, $publicaciones);   
                }
            }

            if ($establecimientos) {
                $publicaciones = $this->filtrarEstablecimiento($establecimientos, $publicaciones);
            }

                $id_funcionarios = array();
                foreach ($publicaciones as $publicacion) {
                    if ($publicacion->funcionario->establecimiento->estado == 'activo') {
                        $id_funcionarios[] = $publicacion->funcionario->id;
                    }
                }

                $funcionarios = Funcionario::all();
                $id_funcionarios = array();
                foreach ($funcionarios as $funcionario) {
                    if ($funcionario->user->estado == 'activo') {
                        $id_funcionarios[] += $funcionario->id;
                    }
                }

                $publicaciones = $publicaciones->where('estado', '=', 'activa')
                    ->whereIn('funcionario_id', $id_funcionarios)
                    ->orderBy('fecha_publicacion', 'DESC')
                    ->get();

                    /*
                $publicaciones = $publicaciones->where('estado', '=', 'activa')
                    ->whereIn('funcionario_id', $id_funcionarios)
                    ->orderBy('fecha_publicacion', 'DESC')
                    ->get();
                    */
         } else {
            $publicaciones = array();
         }

        if(Auth::check()){
//            echo "hola";
            return $this->cargar_preferencias($publicaciones);


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
            $areas = Area::all();       
            $establecimientos = Establecimiento::all();
            return view('reviews')->with([
                'areas'=> $areas,
                'establecimientos'=> $establecimientos,
                'publicaciones' => $publicaciones,
            ]);
        }


    }


    public function buscar_por_establecimiento($campo){
        $establecimientos = Establecimiento::where('nombre', 'like', '%'.$campo.'%')->get();
        $idestablecimientos = array();
        foreach ($establecimientos as $establecimiento) {
            $idestablecimientos[] = $establecimiento->id;
        }
        $funcionarios = Funcionario::whereIn('establecimiento_id', $idestablecimientos)->get();
        $idfuncionarios = array();
        foreach ($funcionarios as $funcionario) {
            $idfuncionarios[] = $funcionario->id;
        }
        $publicaciones = Publicacion::whereIn('funcionario_id', $idfuncionarios)->get();
        return $publicaciones;
    }

    public function buscar_por_lugar($campo){
        $lugares = Lugar::where('nombre', 'like', '%'.$campo.'%')->get();
        $idlugares = array();
        foreach ($lugares as $lugar) {
            $idlugares[] = $lugar->id;
        }
        //return $idlugares;
        //$publicaciones = Publicacion::whereIn('lugar_id', $idlugares)->get();
        $aplicaciones = Aplica::whereIn('lugar_id', $idlugares)->get();
        $idpublicaciones = array();
        foreach ($aplicaciones as $aplicacion) {
            $idpublicaciones[] = $aplicacion->publicacion_id;
        }
        $publicaciones = Publicacion::whereIn('id', $idpublicaciones)->get();
        return $publicaciones;
    }

    public function buscar_por_area($campo){
        $areas = Area::where('nombre', 'like', '%'.$campo.'%')->get();
        $idareas = array();
        foreach ($areas as $area) {
            $idareas[] = $area->id;
        }
        $grupos = Grupo::whereIn('area_id', $idareas)->get();
        $idgrupos = array();
        foreach ($grupos as $grupo) {
            $idgrupos[] = $grupo->publicacion_id;
        }            
        $publicaciones = Publicacion::whereIn('id', $idgrupos)->get();
        return $publicaciones;
    }

    

    public function show($tipo){
        $funcionarios = Funcionario::all();
        $id_funcionarios = array();
        foreach ($funcionarios as $funcionario) {
            if ($funcionario->user->estado == 'activo') {
                $id_funcionarios[] += $funcionario->id;
            }
        }

        $publicaciones = Publicacion::where('tipo', '=', $tipo)
            ->where('estado', '=', 'activa')
            ->whereIn('funcionario_id', $id_funcionarios)
            ->orderBy('fecha_publicacion', 'DESC')
            ->get();

        //$areas = Area::all();       
        //$establecimientos = Establecimiento::all();
        if(Auth::check()){
            return $this->cargar_preferencias($publicaciones);
        
        } else {
            return view('reviews')->with([
                //'areas'=> $areas,
                //'establecimientos'=> $establecimientos,
                'publicaciones' => $publicaciones,
            ]);
        }
    }

    public function filtrar_busqueda($publicaciones, $filtros){

        //$publicaciones 
        return $publicaciones;
    }

    public function cargar_preferencias($publicaciones){
        //return "hohohoh";
            $user = User::find(Auth::user()->id);
            $areas = Area::all();
            $establecimientos = Establecimiento::all();
            $lugares = Lugar::where('tipo', '=', 'municipio')->get();

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
                    'lugares' => $lugares,
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
                    'lugares' => $lugares,
                ]);        
            } elseif($user->idrol === 3){
                //return "editar " .$user;

                $establecimientos = Establecimiento::all();
                return view('reviews', [
                    'areas'=> $areas,
                    'establecimientos'=> $establecimientos,
                    'user'=>$user,
                    'publicaciones' => $publicaciones,
                    'lugares' => $lugares,
                ]);        
            }
    }
}
