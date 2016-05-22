<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

	{!!Html::style('css/bootstrap.min.css')!!}
	{!!Html::style('css/estilos.css')!!}

	<!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}"> 
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo.css') }}"> -->
	<title>Mundocente | @yield('titulo-pagina')</title>
	<script type="text/javascript">
	
		function registrarDocente(formulario){			
			var campos=document.getElementsByClassName("form-control");		
			if(campos[0].value!="" && campos[1].value!="" && campos[2].value!="")
				formulario.form.submit();
			else
				//alert("no se puede enviar cabron");
			
		}

		function registrarPublicador(formulario){
			var campos=document.getElementsByClassName("form-control");		
			if(campos[0].value!="" && campos[1].value!="" && campos[2].value!="")
				formulario.form.submit();
			else
				//alert("no se puede enviar cabron");
		}
	
	</script>
</head>
<body>
	@yield('superior')
	@yield('contenido')
	@yield('pie')


<!--
	{!!Html::style('js/jquery-1.12.3.min.js')!!}
	{!!Html::style('js/bootstrap.min.js')!!}
	{!!Html::style('js/main.js')!!}

	-->

	<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
</body>
</html>