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

//Route::post('listar', 'PublicacionesController@listar');

Route::get('/', 'FrontController@index'); 
Route::get('contacto', 'FrontController@contacto');
Route::get('reviews', 'FrontController@reviews');

Route::resource('login', 'LoginController');
Route::get('logout', 'LoginController@logout');

Route::get('/busqueda', 'BuscadorController@index');

Route::resource('publicacion', 'PublicacionController');
Route::resource('usuario', 'UsuarioController');

Route::post('recibe','Prueba@recibir');

/*
Route::get('publicaciones/{id}', function($id){
	return view('publicaciones')->with('id', $id);
});
*/