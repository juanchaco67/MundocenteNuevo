<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Auth;
use Session;
use Redirect;

class LoginController extends Controller
{
    //

    public function store(LoginRequest $request){
    	//return $request['email'] . " " .$request['password'];
        //echo "ROL: " .$request['rol'];
        if ($request['rol'] === "Docente") {
            //echo "Hola docente";
        } elseif ($request['rol'] === "Funcionario") {
            //echo "Hola funcionario";
        }

    	if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
    		return Redirect::to('/');
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
