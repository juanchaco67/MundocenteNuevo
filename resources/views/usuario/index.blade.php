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