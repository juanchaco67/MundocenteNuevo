@extends('layouts.admin')

@section('titulo')
	Universidades/Entidades
@stop

@section('panel')
    @include('layouts.paneladmin')
@stop

@section('titulo-pagina')
	Universidades/Entidades
@stop

@include('alerts.success')


@section('contenido')
	@if(isset($universidades))
		@if($universidades)
			<table class="table">
				<thead>
					<th>Nombre</th>
					<!--<th>Correo</th>-->
					<!--<th>Rol</th>-->
					<!--<th>Estado</th>-->
					<th>Operación</th>
				</thead>
				@foreach($universidades as $universidad)
					<tbody>
						<th>{{ $universidad->nombre }}</th>
						<!-- <th>{{ $universidad->email }}</th> -->
						<!--<th>{{ $universidad->idrol }}</th>-->
						<!-- <th>{{ $universidad->estado }}</th> -->
						<th>
							{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $universidad->id, $atrributes = ['class' => 'btn btn-primary'])!!}
						</th>
					</tbody>
				@endforeach
			</table>
		@else
			<h2 class="text-center">No hay universidades/entidades</h2>
		@endif
	@endif
@stop