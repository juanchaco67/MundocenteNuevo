<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Area;
use App\Lugar;
use App\Publicacion;
use App\Establecimiento;

class AdminController extends Controller
{
   
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $users = User::all();
        $areas = Area::all();
        $lugares = Lugar::all();
        $publicaciones = Publicacion::all();
        $establecimientos = Establecimiento::all();
        return view('admin.index', [
            'areas' => $areas,
            'lugares' => $lugares,
            'publicaciones' => $publicaciones,
            'establecimientos' => $establecimientos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        if ($id == "docentes") {
            return view('docentes.index')->with([
                'docentes' => User::all(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    public function listar_docentes(){
        $docentes = User::where('idrol', '=', 1)->get();
        return view('admin.docentes')->with([
            'docentes' => $docentes,
        ]);
    }

    public function listar_publicadores(){
        $publicadores = User::where('idrol', '=', 2)->get();
        return view('admin.publicadores')->with([
            'publicadores' => $publicadores,
        ]);
    }

    public function listar_publicaciones(){
        $publicaciones = Publicacion::all();
        return view('admin.publicaciones')->with([
            'publicaciones' => $publicaciones,
        ]);
    }

    public function listar_establecimientos(){
        $establecimientos = Establecimiento::all();
        return view('admin.universidades')->with([
            'universidades' => $establecimientos,
        ]);
    }
}
