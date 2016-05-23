<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Area;
use App\Establecimiento;
use Illuminate\Support\Facades\Auth;
use App\User;

class FrontController extends Controller
{
    //
    public function index(){
    	//return view('index');
        $areas = Area::all();       
        $establecimientos = Establecimiento::all();
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            return view('index')->with([
            'areas'=> $areas,
            'establecimientos'=> $establecimientos,
            'user'=>$user,
            ]);
        } else {
            return view('index')->with([
            'areas'=> $areas,
            'establecimientos'=> $establecimientos,
            ]);
        }
    
    }

    public function contacto(){
    	return view('contacto');
    }

    public function reviews(){
    	return view('reviews');	
    }
}
