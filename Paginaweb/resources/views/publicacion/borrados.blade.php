@extends('layouts.paneladmin')

@section('titulo-pagina')
	Borrados
@stop

@section('contenido')
	@include('alerts.success')

	@if(isset($publicaciones))
			@if($publicaciones)
				<table class="table">
					<thead>
						<th>Nombre</th>
						<th>Resumen</th>
						<th>Tipo</th>
						<th>Fecha publicado</th>
						<th>Fecha cierre</th>
						<th>Acciones</th>
					</thead>
						@foreach($publicaciones as $publicacion)
							@if($publicacion->estado == 'inactiva')
								@include('publicacion.listado')
							@endif
						@endforeach
				</table>
			@else
				<h3 class="text-center">No tiene publicaciones borradas</h3>
				<!--
				<div class="row">
				    <div class="col-md-2 col-md-offset-5">
				    	<div class="form-group">
							<a href="/publicacion/create" class="form-control btn btn-primary">Crear nueva</a>
						</div>
				    </div>
				</div>	
				-->		
			@endif
	@endif
@stop