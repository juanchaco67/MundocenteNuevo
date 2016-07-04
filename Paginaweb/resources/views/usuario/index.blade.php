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
			@foreach($usuarios as $usu)
				<tbody>
					<th>{{ $usu->name }}</th>
					<th>{{ $usu->email }}</th>
					<th>{{ $usu->idrol }}</th>
					<th>{{ $usu->estado }}</th>
					<th>
						{!!link_to_route('admin.edit', $title = 'Editar', $parameters = $usu->id, $atrributes = ['class' => 'btn btn-primary'])!!}
					</th>
				</tbody>
			@endforeach
		</table>
	@endif
@stop