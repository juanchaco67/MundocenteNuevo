<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

	{!!Html::style('css/bootstrap.min.css')!!}
	{!!Html::style('css/estilos.css')!!}

	<!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}"> 
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo.css') }}"> -->
	<title>Mundocente | @yield('titulo-pagina')</title>
</head>
<body>
	<h1>DOCENTE</h1>
	<nav>
		<ul>
			<li><a href="/">Inicio</a></li>
			<li><a href="/">Busqueda</a></li>
			<li><a href="/busqueda">Mi área</a></li>
			<li><a href="/configuracion">Configuración</a></li>
			<li><a href="/logout">Salir</a></li>
		</ul>
	</nav>
	@yield('contenido')


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