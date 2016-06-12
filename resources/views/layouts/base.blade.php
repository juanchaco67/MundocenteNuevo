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
	                <li @yield('miarea')><a href="/busqueda">Mi área</a></li>
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
	                  <li><a href="/busqueda">Mi área</a></li>                 
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
            
            @include('usuario.forms.user')

          </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
      <!-- </form> -->

    </div>
  </div>

 @endif

<!-- Modal -->
  <div id="myModalConfiguracion" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="text-center modal-title">Configuración de la cuenta</h4>
        </div>

        

       <!-- <form role="form" action="registro" method="post"> -->
          <div class="modal-body">
            
            @include('usuario.forms.editar')

          </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
      <!-- </form> -->

    </div>
  </div>




 	<div class="row">
		@yield('superior')
	</div>

<div class="row">
    <div class="paneles container">

      <div class="panel-izquierdo col-xs-12 col-sm-12 col-md-3">
        <div class="">
          <div class="titulo-panel text-center col-xs-12 col-sm-12 col-md-12">
            <h3>Realiza una búsqueda</h3>
          </div>
          <div class="contenido-panel col-xs-12 col-sm-12 col-md-12">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <form action="{{ route('busqueda.store') }}" method="post" class="" role="search">
                  <!-- {{ csrf_field() }} -->
                      {{ csrf_field() }}  
                      <div class="form-group">
                        <!-- <label for="buscador">Búsqueda</label> -->
                          <input id="buscador" name="campo" type="text" class="form-control" placeholder="Ej: Docente, Inglés, Sociales...">
                          <!-- <h4><span class="small">Ej: Docente, Inglés, Sociales, Matemáticas</span></h4> -->
                          <!-- <button type="submit" class="btn btn-primary">Buscar</button> -->
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                      </div>
                  </form>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="resultados">
                </div>
              </div>
              </div>
          </div>
        </div>  

            <div class="">            
	          <div class="titulo-panel text-center col-xs-12 col-sm-12 col-md-12">
	            <h3>Filtrar búsqueda</h3>
	          </div>
	          <div class="contenido-panel col-xs-12 col-sm-12 col-md-12">
	            <div class="row">
	              <div class="col-xs-12 col-sm-12 col-md-12">
	                <h3><a href="/busqueda/revista">Revistas</a></h3>
	                <h3><a href="/busqueda/convocatoria">Convocatorias</a></h3>
	                <h3><a href="/busqueda/evento">Eventos</a></h3>
	                </div>
	              </div>
	          </div>			
	        </div>  

        @if( Auth::check() )
          <div class="">
            <div class="titulo-panel text-center col-xs-12 col-sm-12 col-md-12">
              <h3>Filtra la búsqueda</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <form action="buscar" method="post" class="" role="search">
                    {{ csrf_field() }}
                        <div class="form-group">
                          <!-- <label for="buscador">Búsqueda</label> -->
                            <input id="buscador" name="campo" type="text" class="form-control" placeholder="Busca oportunidades...">
                            <h4><span class="small">Ej: Docente, Inglés, Sociales, Matemáticas</span></h4>
                            <!-- <button type="submit" class="btn btn-primary">Buscar</button> -->
                        </div>
                    </form>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="resultados">
                  </div>
                </div>
                </div>
            </div>
          </div>  
        @endif
      </div>

	    <div class="principal col-xs-12 col-sm-12 col-md-9">
			<div class="">
				
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
		window.onload=function(){
			$("#formularioFuncionario").submit(function(){ 						
						var dato=new FormData();
						dato.append('name',document.formularioFuncionario.name.value);
						dato.append('email',document.formularioFuncionario.email.value);
						dato.append('password',document.formularioFuncionario.password.value);
						dato.append('notificar',document.formularioFuncionario.notificar.value);
						dato.append('rol',document.formularioFuncionario.rol.value);
						dato.append('establecimiento',document.formularioFuncionario.establecimiento.value)			
						var route=$('#formularioFuncionario').attr('action');
		  				var valor=document.getElementById('toke').value;
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
					  return false;
		 		 });

		$("#formularioDocente").submit(function(){ 	
								
						var dato=new FormData();
						dato.append('name',document.formularioDocente.name.value);
						dato.append('email',document.formularioDocente.email.value);
						dato.append('password',document.formularioDocente.password.value);
						dato.append('notificar',document.formularioDocente.notificar.value);
						dato.append('rol',document.formularioDocente.rol.value);			
						$('.areas:checked').each(
						    function() {
						  dato.append('areas[]',$(this).val() );
						    }
						);		
						var route=$('#formularioDocente').attr('action');
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
					  return false;
		 		 });

			$("#formulario").submit(function(){ 								
						var dato={'name':document.fo.name.value,'email':document.fo.email.value,'password':document.fo.password.value,'notificar':document.fo.notificar.value,'rol':document.fo.rol.value};					
						var route=$('#formulario').attr('action');
						var persona={'nombre':'camilo'}			
		  				var valor=document.getElementById('tokenn').value;
						$.ajax({
							url:route,
							headers:{"X-CSRF-TOKEN":valor},
							type:'PUT',	
							dataType: "html",			
							data:dato,		
						
		    				success:function(resp){
		    					document.getElementById('btn-correo').innerHTML=$.parseJSON(resp).email;
		    				 	campos[0].value=$.parseJSON(resp).name;
		    				 	campos[0].value=$.parseJSON(resp).email;
		    				 	campos[0].value=$.parseJSON(resp).password;
		    				}					
						});
				  return false;
		 		 });
			}

	</script>
</body>
</html>