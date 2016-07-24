<tbody>
	<th>{{ $publicacion->nombre }}</th>
	<th>{{ $publicacion->resumen }}</th>
	<th>{{ $publicacion->tipo }}</th>
	<th>{{ $publicacion->created_at }}</th>
	<th>{{ $publicacion->fecha_cierre }}</th>
	<th>
		{!!link_to_route('publicacion.edit', $title = 'Editar', $parameters = $publicacion->id, $atrributes = ['class' => 'btn btn-primary', 'title'=>'Editar esta publicación']])!!}
		@if($publicacion->estado == 'activa')
			<button class="borrar btn btn-default" title="Borrar esta publicación" data-toggle="modal" data-target="#{{ $publicacion->id }}">
			    ¿Borrar?
			</button>

			<div class="modal fade" id="{{ $publicacion->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			            	<button type="button" class="close" data-dismiss="modal">&times;</button>
			                <h4 class="text-center modal-title">Borrar publicación</h4>
			            </div>
			            <div class="modal-body">
			            	<div>
				                <p>¿Seguro que desea eliminar la siguiente publicación?</p>
				                <ul>
				                	<li>
				                		<h4>Nombre </h4>
				                			<p>{{ $publicacion->nombre }}</p>
				                		</li>
				                	<li>
				                		<h4>Resumen </h4>
				                			<p>{{ $publicacion->resumen }}</p></li>
				                	<li>
				                		<h4>Descripción </h4>
				                		<p>{{ $publicacion->descripcion }}</p>
				                	</li>
				                </ul>
				            </div>
			            </div>
			            <div class="modal-footer">
			                {!!Form::open(['route'=>['publicacion.destroy', $publicacion->id], 'method'=>'delete'])!!}
			                <a class="btn btn-default" data-toggle="modal" data-target="#{{ $publicacion->id }}">
					    		Cancelar
							</a>
							{!!Form::submit('Borrar', ['class'=>'btn btn-danger'])!!}
							{!!Form::close()!!}
			            </div>
			        </div>
			    </div>
			</div>

		@else
			<button class="btn btn-default" data-toggle="modal" data-target="#{{ $publicacion->id }}">
				    ¿Recuperar?
				</button>

				<div class="modal fade" id="{{ $publicacion->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
				            	<button type="button" class="close" data-dismiss="modal">&times;</button>
				                <h4 class="text-center modal-title">Recuperar publicación</h4>
				            </div>
				            <div class="modal-body">
				            	<div>
					                <p>¿Seguro que desea recuperar la siguiente publicación?</p>
					                <ul>
					                	<li>
					                		<h4>Nombre </h4>
					                			<p>{{ $publicacion->nombre }}</p>
					                		</li>
					                	<li>
					                		<h4>Resumen </h4>
					                			<p>{{ $publicacion->resumen }}</p></li>
					                	<li>
					                		<h4>Descripción </h4>
					                		<p>{{ $publicacion->descripcion }}</p>
					                	</li>
					                </ul>
					            </div>
				            </div>
				            <div class="modal-footer">
				                {!!Form::open(['action'=>['PublicacionController@recuperar', $publicacion->id]])!!}
				                <a class="btn btn-default" data-toggle="modal" data-target="#{{ $publicacion->id }}">
						    		Cancelar
								</a>
								{!!Form::submit('Recuperar', ['class'=>'btn btn-primary'])!!}
								{!!Form::close()!!}
				            </div>
				        </div>
				    </div>
				</div>


		@endif
		
	</th>
</tbody>