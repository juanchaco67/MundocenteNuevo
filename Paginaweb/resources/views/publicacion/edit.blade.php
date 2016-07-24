@extends('layouts.paneladmin')

@section('titulo-pagina')
	Editar publicación
@stop

@section('contenido')
	@include('alerts.request')
	<!-- <h1>Editar</h1> -->
		{!!Form::model($publicacion, ['route'=>['publicacion.update', $publicacion->id], 'method'=>'put','id'=>'publicacion-store'])!!}
			@include('publicacion.forms.formulario')
  <div class="col-md-1">
		{!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
  </div>
  <div class="col-md-2 col-md-offset-1">
		{!!Form::open(['route'=>['publicacion.destroy', $publicacion->id], 'method'=>'delete'])!!}
		{!!Form::submit('Borrar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	</div>
@stop