@extends('layouts.admin')

@section('titulo')
	Publicaciones
@stop

@section('panel')
    @include('layouts.paneladmin')
@stop

@section('titulo-pagina')
	Publicaciones
@stop

@include('alerts.success')

@section('contenido')
	@if(isset($publicaciones))
		@if($publicaciones)
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Publicador</th>
					<!--<th>Rol</th>-->
					<th>Estado</th>
					<th>Operación</th>
				</thead>
				@foreach($publicaciones as $publicacion)
					<tbody>
						<th>{{ $publicacion->nombre }}</th>
						<th>{{ $publicacion->funcionario->establecimiento->nombre }}</th>
						<!--<th>{{ $publicacion->idrol }}</th>-->
						<th>{{ $publicacion->estado }}</th>
						<th>
							{!!link_to_route('publicacion.edit', $title = 'Editar', $parameters = $publicacion->id, $atrributes = ['class' => 'btn btn-primary'])!!}
						</th>
					</tbody>
				@endforeach
			</table>
		@else
			<h2 class="text-center">No hay publicaciones</h2>
		@endif
	@endif
@stop