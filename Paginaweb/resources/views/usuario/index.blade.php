@extends('layouts.paneladmin')
@section('titulo-pagina')
	Usuarios
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
					<th>Operación</th>
				</thead>
				@foreach($usuarios as $usu)
					@if($usu->estado == 'activo')
						<tbody>
							<th>{{ $usu->name }}</th>
							<th>{{ $usu->email }}</th>
							<th>{{ $usu->idrol }}</th>
							<th>{{ $usu->estado }}</th>
							<th>
								{!!link_to_route('admin.edit', $title = 'Editar', $parameters = $usu->id, $atrributes = ['class' => 'btn btn-primary', 'title'=>'Editar datos de este usuario'])!!}
							</th>
						</tbody>
					@endif
				@endforeach
			</table>

			{!!$usuarios->render()!!}


		@else
			<h3 class="text-center">No tiene usuarios registrados</h3>
			<div class="row">
			    <div class="col-md-2 col-md-offset-5">
			    	<div class="form-group">
						<a href="/usuario/create" class="form-control btn btn-primary" title="Registrar un nuevo usuario">Crear nuevo</a>
					</div>
			    </div>
			</div>			
		@endif
	@endif
@stop