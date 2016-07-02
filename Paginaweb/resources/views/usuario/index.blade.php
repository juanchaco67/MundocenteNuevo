@extends('layouts.paneladmin')

@include('alerts.success')

@section('titulo-pagina')
	Usuarios
@stop

@section('contenido')
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Rol</th>
			<th>Estado</th>
			<th>Operación</th>
		</thead>
		@foreach($users as $user)
			<tbody>
				<th>{{ $user->name }}</th>
				<th>{{ $user->email }}</th>
				<th>{{ $user->idrol }}</th>
				<th>{{ $user->estado }}</th>
				<th>
					{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->id, $atrributes = ['class' => 'btn btn-primary'])!!}
				</th>
			</tbody>
		@endforeach
	</table>
@stop