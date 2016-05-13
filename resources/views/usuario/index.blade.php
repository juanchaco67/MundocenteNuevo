@extends('layouts.base')

<?php
	$mensaje = Session::get('mensaje') 
?>

@if($mensaje == 'store')
	<div class="alert alert-success alert-dismissible" role="alert">
	  <strong>Usuario registrado!</strong> You successfully read this important alert message.
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
			<th>Operación</th>
		</thead>
		@foreach($users as $user)
			<tbody>
				<th>{{ $user->name }}</th>
				<th>{{ $user->email }}</th>
				<th>
					{{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->id, $atrributes = ['class' => 'btn btn-primary'])!!}}
				</th>
			</tbody>
		@endforeach
	</table>
@stop