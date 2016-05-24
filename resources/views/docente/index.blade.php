@extends('layouts.docente')

@section('titulo-pagina')

@stop

@section('contenido')
	<h1>Bienvenido docente</h1>
	@if(isset($publicaciones))
		@foreach($publicaciones as $publicacion)
			<h1>{{ $publicacion->nombre }}</h1>
			<p>{{ $publicacion->descripcion }}</p>
		@endforeach
	@endif
@stop