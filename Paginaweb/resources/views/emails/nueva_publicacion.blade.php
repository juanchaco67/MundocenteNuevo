<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">


</head>
<body>

<h2>Hola {{$notificar['name']}}</h2>

<div>
    Hay una nueva publicacion que te puede interzar.
</div>	

<div style="width:100%;">
	<div style="float:left;width:50%;">
	 <p>{{$publicacion->nombre}} - </p>
	 <p>Tipo:  {{$publicacion->tipo}} </p>
	</div>
	<div style="float:left;width:50%;">

	     @foreach ($lugares as $lugar) 
            @foreach ($lugar as $ciudad_departamento)              
             <p>{{$ciudad_departamento['departamento'] }}: {{$ciudad_departamento['ciudad'] }} </p>                           
        	@endforeach
       	@endforeach
	 </div>
	 <div>
	     <p>{{$publicacion->resumen}}</p>
	    <a href="{{$publicacion->url}}">Ver publicacion</a>
	 </div>
	
</div>	

</body>
</html>
    
