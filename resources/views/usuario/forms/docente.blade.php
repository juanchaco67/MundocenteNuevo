<h3>Registro de Docentes</h3>
<input name="rol" value="docente" id="rol" hidden></input>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
@include('usuario.forms.registro')
<div class="form-group">
		{!!Form::label('Recibir notifaciones')!!}
		@if(isset($user))
			@if($user->docente->notificar === 0)
				{!!Form::checkbox('notificar', '1', true,array('class'=>'campo_checkbox'))!!}
			@else
				{!!Form::checkbox('notificar', '1', false,array('class'=>'campo_checkbox'))!!}
			@endif
		@else
			{!!Form::checkbox('notificar', '0', true,array('class'=>'campo_checkbox'))!!}
		@endif
	</div>
 	<div class="form-group">
		<legend>Areas de interés</legend>
		<fieldset>
			@if(!isset($areas_usuario))
				@if(isset($areas))
					@foreach($areas as $area)				
						<div class="form-group">
							<input id="{{ $area->nombre }}" type="checkbox" name="areas[]" value="{{ $area->id }}"><label for="{{ $area->nombre }}">{{ $area->nombre }}</label></input>
						</div>
					@endforeach
				@endif
			@else
				@if(isset($areas))
					@foreach($areas as $area)
						@if(in_array($area->id, $areas_usuario))
							<div class="form-group">
								<input id="{{ $area->nombre }}" type="checkbox" name="areas[]" value="{{ $area->id }}" checked><label for="{{ $area->nombre }}">{{ $area->nombre }}</label></input>
							</div>
						@else
							<div class="form-group">
								<input id="{{ $area->nombre }}" type="checkbox" name="areas[]" value="{{ $area->id }}"><label for="{{ $area->nombre }}">{{ $area->nombre }}</label></input>
							</div>
						@endif
					@endforeach
				@endif
			@endif
		</fieldset>
	</div>
@if(isset($user))
	<div class="form-group">
		<label for="desactivar">Desactivar esta cuenta</label>
		@if($user->estado === 'inactivo')
			<input name="desactivar" value="desactivar" type="checkbox" checked></input>
		@else
			<input name="desactivar" value="desactivar" type="checkbox"></input>
		@endif
	</div>
@endif
