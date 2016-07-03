<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Area;
use App\Establecimiento;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Interes;
use App\Lugar;

class FrontController extends Controller
{
    //
    public function index(){
    	//return view('index');
        $areas = Area::all();       
        $establecimientos = Establecimiento::all();
        if(Auth::check()){
            $lugares = Lugar::where('tipo', '=', 'municipio')->get();
            $user = User::find(Auth::user()->id);
            if($user->idrol == 1){ 
                //$areas = Area::all();
                $intereses = Interes::where('docente_id', $user->id)->get();
                $areas_usuario = array();
                foreach ($intereses as $interes) {
                    $areas_usuario[] = $interes->area_id;
                }

                //$user->docente->notificar = $notificar;

                return view('index', [
                    'user' => $user,
                    'areas' => $areas,
                    'areas_usuario' => $areas_usuario,
                    'establecimientos' => $establecimientos,
                    'lugares' => $lugares,
                    //'sinfiltrar' => true,
                ]);   
             //echo $user;     
            } elseif($user->idrol === 2){
                //return "editar " .$user;
                //$establecimientos = Establecimiento::all();
                return view('index', [
                    'user' => $user,
                    'areas' => $areas,
                    'establecimientos' => $establecimientos,
                    'lugares' => $lugares,
                    //'sinfiltrar' => true,
                ]);        
            } elseif($user->idrol === 3){
                return view('index', [
                    'areas' => $areas,
                    'establecimientos' => $establecimientos,
                    'lugares' => $lugares,
                    //'sinfiltrar' => true,
                ]); 
            }

            /*
            return view('index')->with([
            'areas'=> $areas,
            'establecimientos'=> $establecimientos,
            'user'=>$user,
            ]);
            */
        } else {
            return view('index')->with([
                'areas'=> $areas,
                'establecimientos'=> $establecimientos,
                //'sinfiltrar' => true,
            ]);
        }
    
    }

    public function contacto(){
    	//return view('contacto');
        $areas = Area::all();       
        $establecimientos = Establecimiento::all();
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            $lugares = Lugar::where('tipo', '=', 'municipio')->get();
            if($user->idrol == 1){ 
                $areas = Area::all();
                $intereses = Interes::where('docente_id', $user->id)->get();
                $areas_usuario = array();
                foreach ($intereses as $interes) {
                    $areas_usuario[] = $interes->area_id;
                }

                //$user->docente->notificar = $notificar;

                return view('contacto', [
                    'user' => $user,
                    'areas' => $areas,
                    'areas_usuario' => $areas_usuario,
                    'lugares' => $lugares,
                    //'sinfiltrar' => true,
                ]);   
             //echo $user;     
            } elseif($user->idrol === 2){
                //return "editar " .$user;
                //$establecimientos = Establecimiento::all();
                return view('contacto', [
                    'user' => $user,
                    'areas' => $areas,
                    'establecimientos' => $establecimientos,
                    'lugares' => $lugares,
                    //'sinfiltrar' => true,
                ]);        
            } elseif($user->idrol === 3){
                return view('contacto', [
                    'areas' => $areas,
                    'establecimientos' => $establecimientos,
                    'lugares' => $lugares,
                    //'sinfiltrar' => true,
                ]); 
            }

            /*
            return view('contacto')->with([
            'areas'=> $areas,
            'establecimientos'=> $establecimientos,
            'user'=>$user,
            ]);
            */
        } else {
            return view('contacto')->with([
                'areas'=> $areas,
                'establecimientos'=> $establecimientos,
            ]);
        }
    }

    public function reviews(){
    	return view('reviews');	
    }
}
