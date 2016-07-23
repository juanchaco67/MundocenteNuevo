<tbody>
	<th>{{ $establecimiento->nombre }}</th>
	<th>{{ $establecimiento->estado }}</th>
	<th>
		{!!link_to_route('establecimiento.edit', $title = 'Editar', $parameters = $establecimiento->id, $atrributes = ['class' => 'btn btn-primary'])!!}
		@if($establecimiento->estado == 'activa')
			<button class="borrar btn btn-default" data-toggle="modal" data-target="#{{ $establecimiento->id }}">
			    ¿Borrar?
			</button>

			<div class="modal fade" id="{{ $establecimiento->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			            	<button type="button" class="close" data-dismiss="modal">&times;</button>
			                <h4 class="text-center modal-title">Borrar establecimiento</h4>
			            </div>
			            <div class="modal-body">
			            	<div>
				                <p>¿Seguro que desea eliminar el siguiente establecimiento?</p>
				                <ul>
				                	<li>
				                		<h4>Nombre </h4>
				                			<p>{{ $establecimiento->nombre }}</p>
				                		</li>
				                	<li>
				                		<h4>Resumen </h4>
				                			<p>{{ $establecimiento->resumen }}</p></li>
				                	<li>
				                		<h4>Descripción </h4>
				                		<p>{{ $establecimiento->descripcion }}</p>
				                	</li>
				                </ul>
				            </div>
			            </div>
			            <div class="modal-footer">
			                {!!Form::open(['route'=>['establecimiento.destroy', $establecimiento->id], 'method'=>'delete'])!!}
			                <a class="btn btn-default" data-toggle="modal" data-target="#{{ $establecimiento->id }}">
					    		Cancelar
							</a>
							{!!Form::submit('Borrar', ['class'=>'btn btn-danger'])!!}
							{!!Form::close()!!}
			            </div>
			        </div>
			    </div>
			</div>

		@else
			<button class="btn btn-default" data-toggle="modal" data-target="#{{ $establecimiento->id }}">
				    ¿Recuperar?
				</button>

				<div class="modal fade" id="{{ $establecimiento->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
				            	<button type="button" class="close" data-dismiss="modal">&times;</button>
				                <h4 class="text-center modal-title">Recuperar establecimiento</h4>
				            </div>
				            <div class="modal-body">
				            	<div>
					                <p>¿Seguro que desea recuperar el siguiente establecimiento?</p>
					                <ul>
					                	<li>
					                		<h4>Nombre </h4>
					                			<p>{{ $establecimiento->nombre }}</p>
					                		</li>
					                	<li>
					                		<h4>Estado </h4>
					                			<p>{{ $establecimiento->estado }}</p></li>
					                </ul>
					            </div>
				            </div>
				            <div class="modal-footer">
				                {!!Form::open(['action'=>['EstablecimientoController@recuperar', $establecimiento->id]])!!}
				                <a class="btn btn-default" data-toggle="modal" data-target="#{{ $establecimiento->id }}">
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