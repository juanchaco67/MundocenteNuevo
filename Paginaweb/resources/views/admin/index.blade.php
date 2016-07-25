@extends('layouts.admin')

@section('titulo')
	Admin
@stop

@section('panel')
	@include('layouts.paneladmin')
@stop

@section('titulo-pagina')
	Panel de administración
@stop

@section('contenido')
	<!-- <h3 class="text-center">Bienvenido {{ $user->name }}</h3> -->
	<h3 class="text-center">Listado de activaciones pendientes</h3>
	@if(isset($pendientes))
		@if($pendientes)
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Rol</th>
					<th>Estado</th>
					<th>Operación</th>
				</thead>
				@foreach($pendientes as $pendiente)
					<tbody>
						<th>{{ $pendiente->name }}</th>
						<th>{{ $pendiente->email }}</th>
						<th>{{ $pendiente->idrol }}</th>
						<th>{{ $pendiente->estado }}</th>
						<th>
							{!!link_to_route('admin.edit', $title = 'Editar', $parameters = $pendiente->id, $atrributes = ['class' => 'btn btn-primary'])!!}
							{!!link_to_route('admin.edit', $title = 'Activar', $parameters = $pendiente->id, $atrributes = ['class' => 'btn btn-primary'])!!}
						</th>
					</tbody>
				@endforeach
			</table>
		@else
			<h4 class="text-center">No tiene activaciones pendientes</h4>
		@endif
	@endif


@stop