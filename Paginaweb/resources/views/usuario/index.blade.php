@extends('layouts.paneladmin')

@include('alerts.success')

@section('titulo-pagina')
	Usuarios
@stop

@section('contenido')
	@if(isset($usuarios))
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Rol</th>
				<th>Estado</th>
				<th>Operación</th>
			</thead>
			@foreach($usuarios as $usuario)
				<tbody>
					<th>{{ $usuario->name }}</th>
					<th>{{ $usuario->email }}</th>
					<th>{{ $usuario->idrol }}</th>
					<th>{{ $usuario->estado }}</th>
					<th>
						{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $usuario->id, $atrributes = ['class' => 'btn btn-primary'])!!}
					</th>
				</tbody>
			@endforeach
		</table>
	@endif
@stop