@extends('layouts.panelpublicaciones')

@if(Session::has('mensaje'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	  	{{ Session::get('mensaje') }}
	</div>
@endif

@section('titulo-pagina')
	Mostrar
@stop

@section('contenido')
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Tipo</th>
			<th>Fecha publicado</th>
			<th>Fecha cierre</th>
			<th>Acciones</th>
		</thead>
		@foreach($publicaciones as $publicacion)
			<tbody>
				<th>{{ $publicacion->nombre }}</th>
				<th>{{ $publicacion->descripcion }}</th>
				<th>{{ $publicacion->tipo }}</th>
				<th>{{ $publicacion->created_at }}</th>
				<th>{{ $publicacion->fecha_cierre }}</th>
				<th>
					{!!link_to_route('publicacion.edit', $title = 'Editar', $parameters = $publicacion->id, $atrributes = ['class' => 'btn btn-primary'])!!}
					<button class="btn btn-default" data-href="/delete.php?id=54" data-toggle="modal" data-target="#confirm-delete">
					    ¿Borrar?
					</button>
					<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
				                Borrar publicación
				            </div>
				            <div class="modal-body">
				                <p>¿Seguro que desea eliminar la siguiente publicación?</p>
				                <ul>
				                	<li><h4>Nombre </h4>{{ $publicacion->nombre }}</li>
				                </ul>
				            </div>
				            <div class="modal-footer">
					            <button class="btn btn-default" data-href="/delete.php?id=54" data-toggle="modal" data-target="#confirm-delete">
						    		Cancelar
								</button>
				                {!!link_to_route('publicacion.destroy', $title = 'Borrar', $parameters = $publicacion->id, $atrributes = ['class' => 'btn btn-danger'])!!}
				            </div>
				        </div>
				    </div>
				</div>
				</th>
			</tbody>
		@endforeach
	</table>
@stop