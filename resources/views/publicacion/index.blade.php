@extends('layouts.admin')

@if(Session::has('mensaje'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	  	{{ Session::get('mensaje') }}
	</div>
@endif

@section('titulo-pagina')
	Mostrar
@stop

@section('contenido')
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Operación</th>
		</thead>
		@foreach($publicaciones as $publicacion)
			<tbody>
				<th>{{ $publicacion->nombre }}</th>
				<th>{{ $publicacion->descripcion }}</th>
				<th>
					{!!link_to_route('publicacion.edit', $title = 'Editar', $parameters = $publicacion->id, $atrributes = ['class' => 'btn btn-primary'])!!}
				</th>
			</tbody>
		@endforeach
	</table>
@stop