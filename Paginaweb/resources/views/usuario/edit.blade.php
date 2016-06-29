@extends('layouts.admin')

@section('titulo-pagina')
	Editar
@stop

@section('contenido')
	@include('usuario.forms.editar')
@stop