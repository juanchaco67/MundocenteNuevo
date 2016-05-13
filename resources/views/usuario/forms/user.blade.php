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
		@if(isset($intereses))
			@foreach($intereses as $interes)
				<div class="form-group">
					<input id="interes{{ $interes->id }}" type="checkbox" name="intereses" value="{{ $interes->id }}" checked><label for="interes{{ $interes->id }}">{{ $interes->nombre }}</label></input>
				</div>
			@endforeach
		@endif
	</fieldset>
</div>