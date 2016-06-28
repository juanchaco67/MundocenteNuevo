<input name="rol" value="docente" id="rol"  hidden></input>
@include('usuario.forms.registro')
<div class="form-group">
		{!!Form::label('Recibir notifaciones')!!}
		@if(isset($user))
			@if($user->docente->notificar === 0)
				{!!Form::checkbox('notificar', '1', true,array('class'=>'campo_checkbox','name'=>'notificar'))!!}
			@else
				{!!Form::checkbox('notificar', '1', false,array('class'=>'campo_checkbox','name'=>'notificar'))!!}
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
								<input id="{{ $area->nombre }}" type="checkbox" name="areas[]" value="{{ $area->id }}" class="areas"><label for="{{ $area->nombre }}">{{ $area->nombre }}</label></input>
							</div>
					
					@endforeach
						</div>
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
