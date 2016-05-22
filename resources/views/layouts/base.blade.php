<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

	{!!Html::style('css/bootstrap.min.css')!!}
	{!!Html::style('css/estilos.css')!!}
<script src="../js/jquery-1.12.3.min.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}"> 
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo.css') }}"> -->
	<title>Mundocente | @yield('titulo-pagina')</title>
<script type="text/javascript">


window.onload=function(){

document.getElementById('registrar_docente').onclick=function(){				
			var campos=document.getElementsByClassName('form-control');
			var check=document.getElementsByClassName('campo_checkbox');	
			var rol=document.getElementsByName('rol')[0];		
			
				var dato=new FormData();
				dato.append('name',campos[0].value);
				dato.append('email',campos[1].value);
				dato.append('password',campos[2].value);
				dato.append('notificar',check[0].value);
				dato.append('rol',rol.value);
				//var ajax=new Ajax();
				//ajax.inicializar();
				//ajax.enviar(dato,"http://localhost:8000/pudrete");
				//ajax.muestraContenido();
				var route="http://localhost:8000/usuario";
  				var valor=document.getElementById('token').value;
				$.ajax({
					url:route,
					headers:{"X-CSRF-TOKEN":valor},
					type:'POST',	
					dataType: "html",			
					data:dato,
					cache: false,
   					contentType: false,
    				processData: false,
    				success:function(){
    				 window.location="http://localhost:8000/usuario";
    				},
					error:function(error){
						$("#msj").html($.parseJSON(error.responseText).email+" "+$.parseJSON(error.responseText).password);
						$("#msj-error").fadeIn();
					}
				});
			
			
		}
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