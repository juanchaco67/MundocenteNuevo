<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

	{!!Html::style('css/bootstrap.min.css')!!}
	{!!Html::style('css/estilo.css')!!}

	<!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}"> 
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo.css') }}"> -->
	<title>Mundocente | @yield('titulo-pagina')</title>
</head>
<body>
	@yield('contenido')


	{!!Html::style('js/jquery-1.12.3.min.js')!!}
	{!!Html::style('js/bootstrap.min.js')!!}
	{!!Html::style('js/main.js')!!}

	<form class="form-group">
		<label>Buscar</label>
		<input class="form-control"type="text"></input>
	</form>
	<input class="btn btn-primary" type="button" value="Buscar"></input>

	<!--
	<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script> -->
</body>
</html>