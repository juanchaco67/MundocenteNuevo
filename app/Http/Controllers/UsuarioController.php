<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Session;
use Redirect;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UsuarioController extends Controller
{
    //
    public function index(){
    	//return "index de usuario";
    	$users = User::all();

    	return view('usuario.index', compact('users'));
    }

    public function create(){
    	return view('usuario.create');
    }

    public function store(UserCreateRequest $request){
    	User::create([
    		'name' => $request['name'],
    		'email' => $request['email'],
    		'password' => $request['password'],
		]);
    	//return "store";
    	//return "Usuario registrado";
    	//return redirect('usuario')->with('mensaje', 'Usuario creado');
        Session::flash('mensaje', 'Usuario creado');
        return redirect('usuario');
    }

    public function show($id){
    	return "show usuario" .$id;
    }

    public function edit($id){
    	//return "edit usuario" .$id;
        $user = User::find($id);
        return view('usuario.edit', ['user' => $user]);
    }

    public function update($id, UserUpdateRequest $request){
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        Session::flash('mensaje', 'Usuario Editado');
        return Redirect::to('usuario');
    }

    public function destroy($id){
        User::destroy($id);

        Session::flash('mensaje', 'Usuario Eliminado');
        return Redirect::to('usuario');
    }
}
