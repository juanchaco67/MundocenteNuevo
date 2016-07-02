@extends('layouts.admin')

@section('panel')
    @include('layouts.paneladmin')
@stop

@section('titulo-pagina')
	Editar
@stop

@section('contenido')
	@include('usuario.forms.editar')
@stop