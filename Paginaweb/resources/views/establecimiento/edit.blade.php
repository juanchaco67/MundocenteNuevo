@extends('layouts.paneladmin')

@section('titulo-pagina')
	Editar publicación
@stop

@section('contenido')
	@include('alerts.request')
	<!-- <h1>Editar</h1> -->
		{!!Form::model($publicacion, ['route'=>['publicacion.update', $publicacion->id], 'method'=>'put'])!!}
			@include('publicacion.forms.formulario')
		{!!Form::submit('Actualizar', ['class'=>'btn btn-primary', 'title'=>'Actualizar esta Universidad/Entidad']])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['publicacion.destroy', $publicacion->id], 'method'=>'delete'])!!}
		{!!Form::submit('Borrar', ['class'=>'btn btn-danger', 'title'=>'Borrar esta Universidad/Entidad']])!!}
		{!!Form::close()!!}
@stop