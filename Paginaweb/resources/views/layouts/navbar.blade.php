<header>
	    <nav class="navbar navbar-default navbar-fixed-top" data-target=".navbar-collapse">
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
	                @elseif( Auth::user()->idrol === 3)
	                	<li @yield('admin')><a class="admin" href="/admin">Panel de control</a></li>
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
		                @elseif( Auth::user()->idrol === 3)
		                	<li><a class="admin" href="/admin">Panel de control</a></li>
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




@if( !Auth::check() || ( Auth::check() && Auth::user()->idrol === 3 ) )
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

            @if( Auth::user()->idrol == 3)

            	@if(isset($user))

					{!!Form::model($user, ['route'=>['usuario.update', $user->id], 'method'=>'put','name'=>'formularioAdmin','onsubmit'=>'return false;','id'=>'formularioAdmin'])!!}

					<input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
						@include('usuario.forms.admin')

					<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							{!!Form::submit('Actualizar', ['id'=>'submit-editar-admin','class'=>'btn btn-primary'])!!}
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