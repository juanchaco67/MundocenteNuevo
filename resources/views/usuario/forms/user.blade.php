<div class="form-group">
	{!!Form::label('Nombre')!!}
	{!!Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de usuario'])!!}
</div>
<div class="form-group">
	{!!Form::label('Correo')!!}
	{!!Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el correo'])!!}
</div>
<div class="form-group">
	{!!Form::label('Contraseña')!!}
	{!!Form::password('password', ['class'=>'form-control', 'placeholder'=>'Ingresa la contraseña'])!!}
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