@extends('layouts.base')

@section('titulo-pagina')
	Usuario
@stop

@section('contenido')
	{!!Form::open(['route'=>'usuario.store', 'method'=>'post'])!!}
		<div class="form-group">
			{!!Form::label('Nombre')!!}
			{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de usuario'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Correo')!!}
			{!!Form::text('correo', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el correo'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Contraseña')!!}
			{!!Form::password('contrasena', ['class'=>'form-control', 'placeholder'=>'Ingresa la contraseña'])!!}
		</div>
		{!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

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
@stop