@extends('layouts.base')

@section('titulo-pagina')
	Editar
@stop

@section('contenido')
	<h1>Editar</h1>
	{!!Form::model($user, ['route'=>['usuario.update', $user->id], 'method'=>'put'])!!}
		@include('usuario.forms.user')
		{!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
@stop