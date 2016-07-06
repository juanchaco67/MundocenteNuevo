<input name="rol" value="docente" id="rol"  hidden></input>
@include('usuario.forms.registro')
<div class="form-group">
		<label for="notificar">Recibir notificaciones</label>
		@if(isset($usuario))
			@if($usuario->docente)
				@if($usuario->docente->notificar === 0)
					{!!Form::checkbox('notificar', '1', true,array('class'=>'campo_checkbox','name'=>'notificar'))!!}
				@else
					{!!Form::checkbox('notificar', '1', false,array('class'=>'campo_checkbox','name'=>'notificar'))!!}
				@endif
			@endif
		@else
			{!!Form::checkbox('notificar', '0', true,array('class'=>'campo_checkbox','name'=>'notificar'))!!}
		@endif
	</div>
 	<div class="form-group">
		<legend>Areas de interés</legend>
		<fieldset>
			@if(!isset($areas_usuario))
				@if(isset($areas))
				<!--<div class="barra-scroll form-group" style="overflow-y: scroll; width:100%; height: 30%;">-->
				<div class="barra-scroll">
					@foreach($areas as $area)				
							<div class="form-group">
								<input id="area{{ $area->id }}" type="checkbox" name="areas[]" value="{{ $area->id }}" class="areas"><label for="area{{ $area->id }}">{{ $area->nombre }}</label></input>
							</div>
					
					@endforeach
				</div>
				@endif
			@else
				@if(isset($areas))
					<div class="barra-scroll">
						@foreach($areas as $area)
							@if(in_array($area->id, $areas_usuario))
								<div class="form-group">
									<input id="area{{ $area->id }}" type="checkbox" name="areas[]" value="{{ $area->id }}" class="areas" checked><label for="area{{ $area->id }}">{{ $area->nombre }}</label></input>
								</div>
							@else
								<div class="form-group">
									<input id="area{{ $area->id }}" type="checkbox" name="areas[]" value="{{ $area->id }}" class="areas"><label for="area{{ $area->id }}">{{ $area->nombre }}</label></input>
								</div>
							@endif
						@endforeach
					</div>
				@endif
			@endif
		</fieldset>
	</div>
@if(isset($usuario))
	@if($usuario->estado == "activo")
		<div class="form-group">
			<label for="desactivar">Desactivar esta cuenta</label>
			@if($usuario->estado === 'inactivo')
				<input name="desactivar" id="" value="desactivar" type="checkbox" checked></input>
			@else
				<input name="desactivar" id="desactivar" value="desactivar" type="checkbox"></input>
			@endif
		</div>
	@else
		<div class="form-group">
			<label for="activar">Activar esta cuenta</label>
			@if($usuario->estado === 'activo')
				<input name="activar" id="" value="activar" type="checkbox" checked></input>
			@else
				<input name="activar" id="activar" value="activar" type="checkbox"></input>
			@endif
		</div>
	@endif
{{--
	@if($usuario->estado === 'activo')
		<div class="form-group">	
			<label for="desactivar">Desactivar esta cuenta</label>
			@if($usuario->estado === 'inactivo')
				<input id="desactivar" name="desactivar" value="desactivar" type="checkbox" checked></input>
			@else
				<input id="desactivar" name="desactivar" value="desactivar" type="checkbox"></input>
			@endif
		</div>
	@endif
--}}
@endif
