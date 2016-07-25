@extends('layouts.paneladmin')

@section('titulo-pagina')
	Establecimientos
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
						@if($establecimiento->estado == 'activo')
							@include('establecimiento.listado')
						@endif
					@endforeach
			</table>
			<div class="row">
			    <div class="col-md-2 col-md-offset-5">
			    	<div class="form-group">
						<a href="/establecimiento/create" class="form-control btn btn-primary" title="Crear una nueva Universidad/Entidad">Crear nuevo</a>
					</div>
			    </div>
			</div>	

			<h4 class="text-center">Total en esta página: {{count($establecimientos)}}</h4>
			{!!$establecimientos->render()!!}
		@else
			<h3 class="text-center">No tiene establecimientos</h3>
			<div class="row">
			    <div class="col-md-2 col-md-offset-5">
			    	<div class="form-group">
						<a href="/establecimiento/create" class="form-control btn btn-primary" title="Crear una nueva Universidad/Entidad">Crear nuevo</a>
					</div>
			    </div>
			</div>			
		@endif
	@endif
@stop