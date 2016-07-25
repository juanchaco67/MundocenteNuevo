<header>

	<!--
	<div class="menu_bar">
		<a href="#" class="bt-menu"><span class="icon-list2">Menu</span></a>
	</div>
	-->

	<!--- <nav>
		<ul>
			<li><a href="#"><span class="icon-">Inicio</a></span></li>
			<li><a href="#"><span class="icon-">Trabajos</a></span></li>
			<li><a href="#"><span class="icon-">Proyectos</a></span></li>
			<li><a href="#"><span class="icon-">Servicios</a></span></li>
			<li><a href="#"><span class="icon-">Contactos</a></span></li>
		</ul>
	</nav> -->

	    <nav class="navbar navbar-default navbar-fixed-top" data-target=".navbar-collapse">
	        <div class="container">
	          <!-- Brand and toggle get grouped for better mobile display -->
	          <div class="navbar-header">
	            <a class="navbar-brand" href="/">
		          <img id="logo" alt="logo" src="{{ URL::asset('img/logo-imagen.png') }}">
		          <img id="texto" alt="nombre" src="{{ URL::asset('img/logomun-texto.png') }}">
	            </a>
	           
	           	<div class="menu_bar navbar-toggle collapsed">
					<!-- <a href="#" class="bt_menu"><span class="icon-list2">Menu</span></a> -->
					<!--
			            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
			              <span class="sr-only">Toggle navigation</span>
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
			            </button>
			            -->
			            <a href="#" class="bt_menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
			            	<span class="icon-list2">
			              <span class="sr-only">Toggle navigation</span>
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
			              </span>
			            </a>

			            <!--<a href="#" class="bt_menu"><span class="icon-list2">Menu</span></a> -->

	            </div>

	            	<!--<div class="menu_bar">
						<a href="#" class="bt-menu"><span class="icon-list2">Menu</span></a>
					</div>
					-->
	          </div>

	          <!-- Collect the nav links, forms, and other content for toggling -->
	          <div class="lista-navbar" id="bs-example-navbar-collapse-1">
	            <ul class="nav navbar-nav navbar-right">

	              <li @yield('inicio')><a href="/">Inicio<span class="sr-only">(current)</span></a></li>
	              @if( Auth::check() )
	              	@if( Auth::user()->idrol === 1 )
	                	<li @yield('miarea')><a class="area" href="/busqueda">Mi área</a></li>
	                @elseif( Auth::user()->idrol === 2)
	                	@if( Auth::user()->estado == "inactivo" )
	                		<!-- Modal -->
	                		<li><a data-toggle="modal" data-target="#aviso" href="#">Mis publicaciones</a></li>
	                	@else
	                		<li @yield('publicacion')><a class="publicaciones" href="/publicacion">Mis publicaciones</a></li>
	                	@endif
	                @elseif( Auth::user()->idrol === 3)
	                	<li @yield('admin')><a class="admin" href="/admin">Panel de control</a></li>
	                @endif
	              @endif
	              <!-- <li @yield('servicios')><a href="/servicios">Servicios</a></li>  -->
	              @if( !Auth::check() )
	                <li @yield('registro')><a data-toggle="modal" data-target="#myModal" id="registro-user" href="#">Registro</a></li>
	              @endif

	              <li @yield('contacto')><a href="/contacto">Contacto</a></li>
	              @if( Auth::check() )
	              	<li class="dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <i class="fa fa-user fa-fw"></i>  {{ Auth::user()->email }} <i class="fa fa-caret-down"></i>
	                    </a>
	                    <ul class="dropdown-menu dropdown-user">
	                        <li><a data-toggle="modal" data-target="#myModalConfiguracion" href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a></li>
	                        <li class="divider"></li>
	                        <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
	                        </li>
	                    </ul>
	                    <!-- /.dropdown-user -->
                	</li>
                
                	<!--
	                <li>
	                  <div class="dropdown">
	                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="btn-correo">

	                
	                <span class="caret"></span></button>
	                <ul class="dropdown-menu">
		                            
	                  <li><a data-toggle="modal" data-target="#myModalConfiguracion" href="#">Configuracion</a></li>
	                  <li><a href="/logout">Cerrar sesión</a></li>
	                </ul>
	              </div>
	            </li>
	            -->
	                <!-- <li><a href="/salir">Salir</a></li> -->
	              @endif
  		
	                <li >
	               @include('layouts.panelbusqueda2')
	                </li>
	              
	            </ul>
	          </div><!-- /.navbar-collapse -->
	        </div><!-- /.container-fluid -->
	    </nav>
	</header>



@if( Auth::check() && Auth::user()->estado == "inactivo")
	<div class="modal fade" id="aviso" role="dialog">
	    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title text-center">Notificación</h4>
	        </div>
	        <div class="modal-body text-center">
	        	<h4>Espera confirmación</h4>
	          	<h5><p>Debes esperar la aprobación del administrador antes de publicar, te enviaremos un correo electronico para informarte cuando puedas publicar...</p>
	          	</h5>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
@endif


@if( !Auth::check() )
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" id="modal-ocultar">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" id="close-user-form" class="close" data-dismiss="modal">&times;</button>
          <h4 class="text-center modal-title">Registrate en Mundocente</h4>
        </div>


       <!-- <form role="form" action="registro" method="post"> -->
          <div class="modal-body">
            @include('alerts.request')
            @include('alerts.success')

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
            <div id="error-admin"></div>

            @if( Auth::user()->idrol == 3)

            	@if(isset($user))

					{!!Form::model($user, ['route'=>['usuario.update', $user->id], 'method'=>'put','name'=>'formularioAdmin','onsubmit'=>'return false;','class'=>'formularioAdmin'])!!}

					<input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
						@include('alerts.request')
						@include('alerts.success')

						@include('usuario.forms.admin')

					<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							{!!Form::submit('Actualizar', ['class'=>'submit-editar-admin btn btn-primary'])!!}
					</div>

					{!!Form::close()!!}
				@endif
			@else
            	@include('usuario.forms.editar')
            @endif

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