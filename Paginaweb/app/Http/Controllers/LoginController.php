<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Auth;
use Session;
use Redirect;
use App\User;
use App\Establecimiento;
use App\Area;

class LoginController extends Controller
{
    //

    public function store(LoginRequest $request){
    	//return $request['email'] . " " .$request['password'];
        //echo "ROL: " .$request['rol'];

    	if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
    		//return Redirect::to('/');
            if(Auth::user()->estado == "activo"){
                if (Auth::user()->idrol === 1) {
    //                return "mi area";
                    //return Redirect::to('/busqueda');
                    //Session::flash('mensaje', 'Bienvenido ' . Auth::user()->name);
                    return redirect()->to('/');
                } elseif (Auth::user()->idrol === 2) {
                    //Session::flash('mensaje', 'Bienvenido ' . Auth::user()->name);
                    return redirect()->to('/');
                } elseif (Auth::user()->idrol === 3) {
                    return Redirect::to('/admin');
                }
            } else {
                 return Redirect::to('/logout'); 
            }
            
    	}

    	Session::flash('mensaje-error', 'Datos incorrectos');
    	return Redirect::to('/');

    	//return $request->email;
    }

    public function logout(){
    	Auth::logout();
    	return Redirect::to('/');
    }
}
