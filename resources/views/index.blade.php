@extends('layouts.base')

@section('titulo-pagina')
	Inicio
@stop

@section('contenido')
	<h1>Vista Index</h1>
	<form class="form-group">
		<label>Buscar</label>
		<input class="form-control"type="text"></input>
	</form>
	<input class="btn btn-primary" type="button" value="Buscar"></input>
@stop