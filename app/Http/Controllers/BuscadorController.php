<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Publicacion;
use App\User;
use Auth;
use App\Interes;

class BuscadorController extends Controller
{
    //
    public function index(){
        //$publicaciones = Publicacion::all();
        //return view('publicacion.index', compact('publicaciones'));
        //$user = User::where('id', Auth::user()->id);
        if(Auth::check()){
            $intereses = Interes::where('user_id', Auth::user()->id)->get();
            return $intereses;

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
