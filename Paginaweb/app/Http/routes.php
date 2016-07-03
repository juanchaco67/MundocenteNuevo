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

//Route::get('/busqueda', 'BuscadorController@index');
Route::get('busqueda', function(){
	return view('index');
});
Route::resource('busqueda', 'BuscadorController');

Route::group
Route::get('/publicacion/borrados', 'PublicacionController@borrados');
Route::post('publicacion/recuperar/{id}', 'PublicacionController@recuperar');
Route::resource('publicacion', 'PublicacionController');

Route::resource('usuario', 'UsuarioController');

/*
Route::get('/admin/docentes', 'AdminController@listar_docentes');
Route::get('/admin/publicadores', 'AdminController@listar_publicadores');
Route::get('/admin/publicaciones', 'AdminController@listar_publicaciones');
Route::get('/admin/universidades', 'AdminController@listar_establecimientos');
*/


Route::resource('admin', 'AdminController');

//Route::get('recibe','Prueba@recibir');
//Route::post('filtros','Prueba@filtros');

/*
Route::get('publicaciones/{id}', function($id){
	return view('publicaciones')->with('id', $id);
});
*/