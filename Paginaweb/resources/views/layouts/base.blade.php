<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    @include('layouts.linksplantilla')

	<meta charset="utf-8" />
	{!!Html::style('css/bootstrap.min.css')!!}
	{!!Html::style('css/estilos.css')!!}
	<!-- <script src="../js/jquery-1.12.3.min.js"></script> -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}"> 
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilos.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo-menu.css') }}"> 

	<title>Mundocente | @yield('titulo-pagina')</title>
</head>

<body>
	@include('layouts.navbar')

	<div class="">
			@yield('superior')
	</div>

	<div class="cuerpo">

		<div class="paneles container">
			@yield('titulo-contenido')
			<div class="panel-izquierdo col-xs-12 col-sm-12 col-md-3">

			    @yield('panel')

			</div>		
		  	<div class="principal col-xs-12 col-sm-12 col-md-9">
				<div class="contenido">
					@yield('contenido')
					@yield('pie')
					
				</div>
			</div>
		</div>
	</div>


<footer>
<div class="container">
  <div class="bottom-footer">
    <h3>Desarrollo:</h3>
    <ul>
      <li>Deybi Pulido - <span class="small"> Back-End</span></li>
      <li>Sergio Piña - <span class="small"> Front-End</span></li>
      <li>Juan Rogriguez - <span class="small"> Aseguramiento de Calidad </span></li>
      <li>Sebastian Sarmiento - <span class="small"> Aseguramiento de Calidad</span></li>
    </ul>
    <div class="col-xs-12 col-sm-12 col-md-12">
      
    </div>
  </div>
</div>
</footer>

<!--
	{!!Html::style('js/jquery-1.12.3.min.js')!!}
	{!!Html::style('js/bootstrap.min.js')!!}
	{!!Html::style('js/main.js')!!}

	-->

	<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

	<script type="text/javascript" src="{{ URL::asset('js/formularios.js') }}"></script>

	<script type="text/javascript" src="{{ URL::asset('js/menu.js') }}"></script>

</body>
</html>