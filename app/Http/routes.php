<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::get('publicaciones', function(){
	return view('publicaciones');
});
*/

Route::get('/', 'FrontController@index'); 
Route::get('/contacto', 'FrontController@contacto');
Route::get('/reviews', 'FrontController@reviews');

Route::resource('login', 'LoginController');
Route::get('logout', 'LoginController@logout');

Route::resource('publicaciones', 'PublicacionesController');

Route::resource('usuario', 'UsuarioController');

/*
Route::get('publicaciones/{id}', function($id){
	return view('publicaciones')->with('id', $id);
});
*/

Route::get('ingreso', function(){
	return view('ingreso');
});