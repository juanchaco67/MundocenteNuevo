@extends('layouts.paneladmin')

@section('titulo-pagina')
	Borrados
@stop

@section('contenido')
	@include('alerts.success')

	@if(isset($usuarios))
			@if($usuarios)
				<table class="table">
					<thead>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Rol</th>
						<th>Estado</th>
						<th>Acciones</th>
					</thead>
						@foreach($usuarios as $usuario)
							@if($usuario->estado == 'inactivo')
								@include('usuario.listado')
							@endif
						@endforeach
				</table>
			@else
				<h3 class="text-center">No tiene usuarios borrados</h3>
				<!--
				<div class="row">
				    <div class="col-md-2 col-md-offset-5">
				    	<div class="form-group">
							<a href="/usuario/create" class="form-control btn btn-primary">Crear nueva</a>
						</div>
				    </div>
				</div>	
				-->		
			@endif
	@endif
@stop