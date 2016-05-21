@extends('layouts.admin')

@section('titulo-pagina')
	Usuario
@stop

@section('contenido')
<!--	@include('alerts.request') -->
	@include('usuario.create')
@stop