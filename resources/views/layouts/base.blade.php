<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	{!!Html::style('css/bootstrap.min.css')!!}
	{!!Html::style('css/estilos.css')!!}
	<script src="../js/jquery-1.12.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}"> 
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilos.css') }}">

	<title>Mundocente | @yield('titulo-pagina')</title>
</head>
<body>
	<header>
	    <nav class="navbar navbar-default navbar-fixed-top">
	        <div class="container">
	          <!-- Brand and toggle get grouped for better mobile display -->
	          <div class="navbar-header">
	            <a class="navbar-brand" href="/">
	          <img id="logo" alt="logo" src="{{ URL::asset('img/logo-imagen.png') }}">
	          <img id="texto" alt="nombre" src="{{ URL::asset('img/logomun-texto.png') }}">
	            </a>
	             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	          </div>

	          <!-- Collect the nav links, forms, and other content for toggling -->
	          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	            <ul class="nav navbar-nav navbar-right">

	              <li @yield('inicio')><a href="/">Inicio<span class="sr-only">(current)</span></a></li>
	              @if( Auth::check() )
	              	@if( Auth::user()->idrol === 1 )
	                	<li @yield('miarea')><a class="area" href="/busqueda">Mi área</a></li>
	                @elseif( Auth::user()->idrol === 2)
	                	<li @yield('publicacion')><a class="publicaciones" href="/publicacion">Mis publicaciones</a></li>
	                @endif
	              @endif
	              <!-- <li @yield('servicios')><a href="/servicios">Servicios</a></li>  -->
	              @if( !Auth::check() )
	                <li @yield('registro')><a data-toggle="modal" data-target="#myModal" href="#">Registro</a></li>
	              @endif

	              <li @yield('contacto')><a href="/contacto">Contacto</a></li>
	              @if( Auth::check() )
	                <li>
	                  <div class="dropdown">
	                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="btn-correo">

	                {{ Auth::user()->email }}
	                <span class="caret"></span></button>
	                <ul class="dropdown-menu">
		                @if( Auth::user()->idrol === 1 )
		                	<li><a class="area" href="/busqueda">Mi área</a></li>
		                @elseif( Auth::user()->idrol === 2)
		                	<li><a class="publicaciones" href="/publicacion">Mis publicaciones</a></li>
		                @endif                 
	                  <li><a data-toggle="modal" data-target="#myModalConfiguracion" href="#">Configuracion</a></li>
	                  <li><a href="/logout">Cerrar sesión</a></li>
	                </ul>
	              </div>
	            </li>
	                <!-- <li><a href="/salir">Salir</a></li> -->
	              @endif

	            </ul>
	          </div><!-- /.navbar-collapse -->
	        </div><!-- /.container-fluid -->
	    </nav>
	</header>




@if(!Auth::check())
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="text-center modal-title">Registrate en Mundocente</h4>
        </div>

        

       <!-- <form role="form" action="registro" method="post"> -->
          <div class="modal-body">
            @include('alerts.request')
            @include('usuario.forms.user')

          </div>

            <!--<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            -->
        </div>
      <!-- </form> -->

    </div>
  </div>

 @endif

 @if( Auth::check() )

<!-- Modal -->
  <div id="myModalConfiguracion" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="text-center modal-title"> Configuración de la cuenta</h4>
        </div>

        

       <!-- <form role="form" action="registro" method="post"> -->
          <div class="modal-body">
            @include('alerts.request')
            @include('usuario.forms.editar')

          </div>

          	<!--
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            -->
        </div>
      <!-- </form> -->

    </div>
  </div>
@endif



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

			formulario=function(metodo,id){
					
				event.preventDefault();
				var route=$("#"+id).attr('action');
				var valor=document.getElementById('token').value;
				$.ajax({
					url:route,
					headers:{"X-CSRF-TOKEN":valor},
					method:metodo,
					data:$("#"+id).serialize(),
					success:function(resp){

						if(metodo=="PUT")
							document.getElementById('btn-correo').innerHTML=resp.email;
						else if(id=="formularioFuncionario" && metodo=="POST"){
						window.location="http://localhost:8000/publicacion";
						}
							else if(id=="formularioDocente" && metodo=="POST"){
						window.location="http://localhost:8000";
						}

					},
					error:function(error){
					
							var html=$('<div   id="error-panel" class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span >&times;</span></button><ul id="error-lista"></ul></div>');	
							$('#error').html(html);	
							result = $.parseJSON(error.responseText);	
							var ul=document.getElementById('error-lista');
							ul.innerHTML="";
							for(var k in result)   			 
			  			 			ul.innerHTML+='<li>'+result[k]+'</li>';
					}					
				});
				return false;
			};
			$('#submit-editar-docente').click(function(){
			
				formulario("PUT","formularioDocente");
			});
			$('#submit-editar-funcionario').click(function(){

				formulario("PUT","formularioFuncionario");
			});
			$('#submit-registrar-funcionario').click(function(){
				formulario("POST","formularioFuncionario");
			});
			$('#submit-registrar-docente').click(function(){
				formulario("POST","formularioDocente");
			});


	});

	</script>
</body>
</html>