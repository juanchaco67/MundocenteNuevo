<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


	<meta charset="utf-8" />
	{!!Html::style('css/bootstrap.min.css')!!}
	{!!Html::style('css/estilos.css')!!}
	<!-- <script src="../js/jquery-1.12.3.min.js"></script> -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}"> 
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilos.css') }}">

	<title>Mundocente | @yield('titulo-pagina')</title>
</head>
<body>
	@include('layouts.navbar')

	<div class="row">
			@yield('superior')
	</div>

	<div class="cuerpo row">

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

	<script type="text/javascript">

		$(document).ready(function(){

			formularioFuncionario=function(metodo,id){
					
				event.preventDefault();
				var route=$("#"+id).attr('action');
				var valor=document.getElementById('token').value;

				$.ajax({
					url:route,
					headers:{"X-CSRF-TOKEN":valor},
					method:metodo,
					data:$("#"+id).serialize(),
					success:function(resp){

						if(metodo=="PUT"){
							document.getElementById('btn-correo').innerHTML=resp.email;
						}
						else if(id=="formularioFuncionario" && metodo=="POST"){
							window.location="http://localhost:8000/publicacion";
						}
							else if(id=="formularioDocente" && metodo=="POST"){
							window.location="http://localhost:8000";
						}

					},
					error:function(error){
							
							//console.log(error.responseText);
							var html=$('<div   id="error-panel" class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span >&times;</span></button><ul id="error-lista"></ul></div>');	
							$('#error').html(html);	
							result = $.parseJSON(error.responseText);	
							var ul=document.getElementById('error-lista');
							ul.innerHTML="";
							for(var k in result){
			  			 			ul.innerHTML+='<li>'+result[k]+'</li>';
			  			 	}

			  			 	$(".modal").animate({
						        scrollTop: 0
						    }, 600); 

					}					
				});
				return false;
			};
			$('#submit-editar-docente').click(function(){
			
				formularioFuncionario("PUT","formularioDocente");
			});
			$('#submit-editar-funcionario').click(function(){

				formularioFuncionario("PUT","formularioFuncionario");
			});
			$('#submit-registrar-funcionario').click(function(){
				formularioFuncionario("POST","formularioFuncionario");
			});
			$('#submit-registrar-docente').click(function(){
				formularioFuncionario("POST","formularioDocente");
			});


	});

	</script>
</body>
</html>