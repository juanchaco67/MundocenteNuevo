@extends('layouts.paneladmin')

@section('panel')
    @include('layouts.paneladmin')
@stop

@section('titulo-pagina')
	Editar usuario
@stop

@section('contenido')
	@include('usuario.forms.editar')
@stop