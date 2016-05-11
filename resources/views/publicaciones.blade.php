@extends('layouts.base')

@section('titulo-pagina')
	Publicaciones
@stop

@section('header')
	<h3>Resultados</h3>
	@if(isset($id))
		<p>Consultar {{ $id }}</p>
	@endif
@stop