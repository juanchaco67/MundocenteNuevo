<div class="form-group">
	{!!Form::label('Nombre')!!}
	{!!Form::text('name', null, ['class'=>'txtNombre form-control', 'placeholder'=>'Ingresa el nombre de usuario'])!!}
	
</div>
<div class="form-group">
	{!!Form::label('Correo')!!}
	<!-- <input class="form-control" type="email" name="email" placeholder="Ingresa el correo"> -->
	{!!Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el correo','name'=>'email'])!!}
</div>
<div class="form-group">
	{!!Form::label('Contraseña')!!}
	{!!Form::password('password', ['class'=>'form-control', 'placeholder'=>'Ingresa la contraseña','name'=>'password'])!!}
</div>