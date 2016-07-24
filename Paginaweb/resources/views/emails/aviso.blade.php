<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">


</head>
<body>
<h2>Bienvenido a Mundocente!</h2>

<div>
    Bienvenido  {{ $user->name }}
</div>	
<div>
<p>
La configuracion de tu cuenta Mundocente {{$user->email}}

@if($user->estado=="activo")
esta activada, ya puedes comenzar ha utilizar nuestros servicios
@else
	no esta activada. Te enviaremos un correo informandote de su activacion.
@endif
</p>
  <a href="http://grupo2.virtualtic.co/" class="myButton">Ir a tu cuenta</a>
</div>

</body>
</html>