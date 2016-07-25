@extends('layouts.paneladmin')

@section('titulo-pagina')
	Borrados
@stop

@section('contenido')
	@include('alerts.success')

	@if(isset($establecimientos))
			@if(count($establecimientos)>0)
				<table class="table">
					<thead>
						<th>Nombre</th>
						<th>Estado</th>
						<th>Acciones</th>
					</thead>
						@foreach($establecimientos as $establecimiento)
							@if($establecimiento->estado == 'inactivo')
								@include('establecimiento.listado')
							@endif
						@endforeach
				</table>

				<h4 class="text-center">Total en esta página: {{count($establecimientos)}}</h4>
				{!!$establecimientos->render()!!}
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