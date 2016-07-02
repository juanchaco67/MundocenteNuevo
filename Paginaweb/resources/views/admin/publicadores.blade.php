@extends('layouts.admin')

@section('titulo')
	Publicadores
@stop

@section('panel')
    @include('layouts.paneladmin')
@stop

@section('titulo-pagina')
	Publicadores
@stop

@include('alerts.success')

@section('contenido')
	@if(isset($publicadores))
		@if($publicadores)
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Correo</th>
					<!-- <th>Rol</th> -->
					<th>Estado</th>
					<th>Operación</th>
				</thead>
				@foreach($publicadores as $publicador)
					<tbody>
						<th>{{ $publicador->name }}</th>
						<th>{{ $publicador->email }}</th>
						<!-- <th>{{ $publicador->idrol }}</th> -->
						<th>{{ $publicador->estado }}</th>
						<th>
							{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $publicador->id, $atrributes = ['class' => 'btn btn-primary'])!!}
						</th>
					</tbody>
				@endforeach
			</table>
		@else
			<h2 class="text-center">No hay publicadores</h2>
		@endif
	@endif
@stop