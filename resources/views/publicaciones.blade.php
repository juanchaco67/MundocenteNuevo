@extends('layouts.base')

@section('titulo-pagina')
	Publicaciones
@stop

@section('contenido')
	<h3>Resultados</h3>
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