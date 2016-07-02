@extends('layouts.admin')

@section('titulo')
	Docentes
@stop

@section('panel')
    @include('layouts.paneladmin')
@stop

@section('titulo-pagina')
	Docentes
@stop

@include('alerts.success')


@section('contenido')
	@if(isset($docentes))
		@if($docentes)
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Correo</th>
					<!--<th>Rol</th>-->
					<th>Estado</th>
					<th>Operación</th>
				</thead>
				@foreach($docentes as $docente)
					<tbody>
						<th>{{ $docente->name }}</th>
						<th>{{ $docente->email }}</th>
						<!--<th>{{ $docente->idrol }}</th>-->
						<th>{{ $docente->estado }}</th>
						<th>
							{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $docente->id, $atrributes = ['class' => 'btn btn-primary'])!!}
						</th>
					</tbody>
				@endforeach
			</table>
		@else
			<h2 class="text-center">No hay docentes</h2>
		@endif
	@endif
@stop