<tbody>
	<th>{{ $usuario->name }}</th>
	<th>{{ $usuario->email }}</th>
	<th>{{ $usuario->idrol }}</th>
	<th>{{ $usuario->estado }}</th>
	<th>
		{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $usuario->id, $atrributes = ['class' => 'btn btn-primary'])!!}
		@if($usuario->estado == 'activa')
			<button class="borrar btn btn-default" data-toggle="modal" data-target="#{{ $usuario->id }}">
			    ¿Borrar?
			</button>

			<div class="modal fade" id="{{ $usuario->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				                			<p>{{ $usuario->name }}</p>
				                		</li>
				                	<li>
				                		<h4>Correo </h4>
				                			<p>{{ $usuario->email }}</p></li>
				                	<li>
				                		<h4>Rol </h4>
				                		<p>{{ $usuario->idrol }}</p>
				                	</li>

				                	<li>
				                		<h4>Estado </h4>
				                		<p>{{ $usuario->estado }}</p>
				                	</li>
				                </ul>
				            </div>
			            </div>
			            <div class="modal-footer">
			                {!!Form::open(['route'=>['usuario.destroy', $usuario->id], 'method'=>'delete'])!!}
			                <a class="btn btn-default" data-toggle="modal" data-target="#{{ $usuario->id }}">
					    		Cancelar
							</a>
							{!!Form::submit('Borrar', ['class'=>'btn btn-danger'])!!}
							{!!Form::close()!!}
			            </div>
			        </div>
			    </div>
			</div>

		@else
			<button class="btn btn-default" data-toggle="modal" data-target="#{{ $usuario->id }}">
				    ¿Recuperar?
				</button>

				<div class="modal fade" id="{{ $usuario->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					                			<p>{{ $usuario->name }}</p>
					                		</li>
					                	<li>
					                		<h4>Correo </h4>
					                			<p>{{ $usuario->email }}</p></li>
					                	<li>
					                		<h4>Rol </h4>
					                		<p>{{ $usuario->idrol }}</p>
					                	</li>
					                	<li>
					                		<h4>Estado </h4>
					                		<p>{{ $usuario->estado }}</p>
					                	</li>
					                </ul>
					            </div>
				            </div>
				            <div class="modal-footer">
				                {!!Form::open(['action'=>['UsuarioController@recuperar', $usuario->id]])!!}
				                <a class="btn btn-default" data-toggle="modal" data-target="#{{ $usuario->id }}">
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