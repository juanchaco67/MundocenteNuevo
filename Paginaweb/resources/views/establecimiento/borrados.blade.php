@extends('layouts.paneladmin')

@section('titulo-pagina')
	Borrados
@stop

@section('contenido')
	@include('alerts.success')

	@if(isset($establecimientos))
			@if($establecimientos)
				<table class="table">
					<thead>
						<th>Nombre</th>
						<th>Resumen</th>
						<th>Tipo</th>
						<th>Fecha publicado</th>
						<th>Fecha cierre</th>
						<th>Acciones</th>
					</thead>
						@foreach($establecimientos as $establecimiento)
							@if($establecimiento->estado == 'inactiva')
								@include('establecimiento.listado')
							@endif
						@endforeach
				</table>
			@else
				<h3 class="text-center">No tiene establecimientos borrados</h3>
				<!--
				<div class="row">
				    <div class="col-md-2 col-md-offset-5">
				    	<div class="form-group">
							<a href="/establecimiento/create" class="form-control btn btn-primary">Crear nueva</a>
						</div>
				    </div>
				</div>	
				-->		
			@endif
	@endif
@stop