<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">


</head>
<body>
<h2>Hola {{$notificar->name}}</h2>

<div>
    Hay una nueva publicacion que te puede interzar.
</div>	

<div style="width:100%;">


	<div style="">
	    Hay una nueva publicacion que te puede interzar.
	    <p>{{$publicacion->nombre}} - {{$lugar-nombre}}</p>
	     <p>{{$publicacion->resumen}}</p>
	    <a href="{{$publicacion->url}}">Ver publicacion</a>
	</div>	
</div>	

</body>
</html>
