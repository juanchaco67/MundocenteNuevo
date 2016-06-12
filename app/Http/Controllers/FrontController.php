<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Area;
use App\Establecimiento;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Interes;

class FrontController extends Controller
{
    //
    public function index(){
    	//return view('index');
        $areas = Area::all();       
        $establecimientos = Establecimiento::all();
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            if($user->idrol == 1){ 
                $areas = Area::all();
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
                ]);   
             //echo $user;     
            } elseif($user->idrol === 2){
                //return "editar " .$user;
                $establecimientos = Establecimiento::all();
                return view('index', [
                    'user' => $user,
                    'establecimientos' => $establecimientos,
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
            ]);
        }
    
    }

    public function contacto(){
    	//return view('contacto');
        $areas = Area::all();       
        $establecimientos = Establecimiento::all();
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
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
                ]);   
             //echo $user;     
            } elseif($user->idrol === 2){
                //return "editar " .$user;
                $establecimientos = Establecimiento::all();
                return view('contacto', [
                    'user' => $user,
                    'establecimientos' => $establecimientos,
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
