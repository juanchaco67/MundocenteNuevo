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

class BuscadorController extends Controller
{
    //
    public function index(){
        //$publicaciones = Publicacion::all();
        //return view('publicacion.index', compact('publicaciones'));
        //$user = User::where('id', Auth::user()->id);
        if(Auth::check()){
            if(Auth::user()->idrol == 1){
                $intereses = Interes::where('user_id', Auth::user()->id)->get();
                //$grupos = "";
                /*
                foreach ($intereses as $interes) {
                    $grupos = Grupo::where('area_id', $interes->area_id)->first();
                    //echo $grupos;
                    $publicacion = Publicacion::find($grupos->publicacion_id)->first();

                    //echo $publicacion;
                }
                */
                $user = User::find(Auth::user()->id);
                //$areas = Area::find();
                //$interes = $user->interes;
                $docente = Docente::first();
                return $docente->interes;

                
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
