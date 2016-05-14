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
	{!!Form::label('Recibir notifaciones')!!}
	@if(isset($user))
		@if($user->notificar === 0)
			{!!Form::checkbox('notificar', '1', true)!!}
		@else
			{!!Form::checkbox('notificar', '1', false)!!}
		@endif
	@else
		{!!Form::checkbox('notificar', '0', true)!!}
	@endif
</div>