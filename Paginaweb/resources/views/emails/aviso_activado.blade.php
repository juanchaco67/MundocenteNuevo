<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">

<style>


</head>
<body>
<h2>Hola  {{$user->name}}</h2>

<div>
    Su cuenta  ha  cambiado al estado: { $user->estado }
</div>	
<div>
<p>
Cambiaste la configuración recientemente, por lo que tu cuenta de Mundocente <a>{{$user->email}}</a>
@if($user->estado=="activo")
	ya está {{$user->estado}}.</br>
	<a href="http://grupo2.virtualtic.co/" class="myButton">Ir a tu cuenta</a>
 @else
	ya no está {{$user->estado}}.
@endif
</p>
</div>

</body>
</html>