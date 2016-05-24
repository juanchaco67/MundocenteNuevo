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
                //$intereses = Interes::where('docente_id', $docente->id)->get();
                //$grupos = "";
                /*
                foreach ($intereses as $interes) {
                    $grupos = Grupo::where('area_id', $interes->area_id)->first();
                    //echo $grupos;
                    $publicacion = Publicacion::find($grupos->publicacion_id)->first();

                    //echo $publicacion;
                }
                */
                /*
                $valor = DB::table('docentes')
                    ->where('user_id', Auth::user()->id)
                    ->join('intereses', 'intereses.docente_id', '=', 'docentes.id')
                    ->join('areas', 'areas.id', '=', 'intereses.area_id')
                    ->join('grupos', 'grupos.area_id', '=', 'areas.id')
                    ->join('publicaciones', 'publicaciones.id', '=', 'grupos.publicacion_id')
                    ->select('publicaciones.nombre', 'publicaciones.descripcion')
                    ->distinct()
                    ->get();
                return $valor;
                */


                $mezcla = DB::table('docentes')
                    ->where('user_id', Auth::user()->id)
                    ->join('intereses', 'intereses.docente_id', '=', 'docentes.id')
                    ->join('areas', 'areas.id', '=', 'intereses.area_id')
                    ->join('grupos', 'grupos.area_id', '=', 'areas.id')
                    ->join('publicaciones', 'publicaciones.id', '=', 'grupos.publicacion_id')
                    ->select('publicaciones.nombre', 'publicaciones.descripcion')
                    ->distinct()
                    ->get();
                //$areas = Area::find();
                //$interes = $user->interes;
                ///$docente = Docente::first();
                /*
                foreach ($mezcla as $publicacion) {
                    echo $publicacion->nombre;
                }
                */

                //return $mezcla;
                return view('docente.index')->with([
                    'publicaciones' => $mezcla,
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
}
