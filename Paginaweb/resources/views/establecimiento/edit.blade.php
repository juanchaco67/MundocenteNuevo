@extends('layouts.paneladmin')

@section('titulo-pagina')
	Editar establecimiento
@stop

@section('contenido')
	@include('alerts.request')
	<!-- <h1>Editar</h1> -->
		{!!Form::model($establecimiento, ['route'=>['establecimiento.update', $establecimiento->id], 'method'=>'put'])!!}
			@include('establecimiento.forms.formulario')
		{!!Form::submit('Actualizar', ['class'=>'btn btn-primary', 'title'=>'Actualizar esta Universidad/Entidad'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['establecimiento.destroy', $establecimiento->id], 'method'=>'delete'])!!}
		{!!Form::submit('Borrar', ['class'=>'btn btn-danger', 'title'=>'Borrar esta Universidad/Entidad'])!!}
		{!!Form::close()!!}
@stop