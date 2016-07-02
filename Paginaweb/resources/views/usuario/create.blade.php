@extends('layouts.paneladmin')

@section('titulo-pagina')
	Crear usuario
@stop

@section('contenido')
<!--	@include('alerts.request') -->
	@include('usuario.forms.user')
	{{--
	<!-- 
	{!!Form::open(['route'=>'usuario.store', 'method'=>'post'])!!}
		@include('usuario.forms.user')
	{!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
	 -->

	<!--
	<form action="{{ route('usuario.store') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input id="nombre" name="nombre" type="text" class="form-control"></input>
		</div>
		<div class="form-group">
			<label for="correo">Correo</label>
			<input id="correo" name="correo" type="text" class="form-control"></input>
		</div>
		<div class="form-group">
			<label for="contrasena">Contraseña</label>
			<input id="contrasena" name="contrasena" type="password" class="form-control"></input>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Registrar"></input>
		</div>
	</form>
	-->
	--}}
@stop