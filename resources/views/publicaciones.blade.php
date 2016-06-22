@extends('layouts.base')

@section('titulo-pagina')
	Publicaciones
@stop

@section('contenido')
	<h4>Resultados obtenidos</h4>
	@if(isset($publicaciones))
		
		<ul>
			@foreach($publicaciones as $publicacion)
				<li>
					<p>{{ $publicacion->nombre }}</p>
					<p>{{ $publicacion->descripcion }}</p>
				</li>
			@endforeach
		</ul>

	@endif
@stop