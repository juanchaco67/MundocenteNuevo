@extends('layouts.base')

@section('titulo-pagina')
	Inicio
@stop

@section('contenido2')
	<h1>Vista Index</h1>

	 @include('alerts.errors')
   @include('alerts.request')

	<form action="{{ route('publicacion.index') }}" method="get">
    {{ csrf_field() }}
    <div class="form-group">
      <label>Buscar</label>
      <input name="valor" class="form-control" type="text"></input>  
    </div>		
    <input class="btn btn-primary" type="submit" value="Buscar"></input>
	</form>

  <form action="{{ route('login.store') }}" method="post" class="form-signin">
    {{ csrf_field() }}
    <h2 class="form-signin-heading">Ingresar</h2>
    <!--
    <label for="rol">Soy</label>
    <select name="rol" class="form-control">
      <option>Docente</option>
      <option>Funcionario</option>
    </select>
    -->
    <label for="email" class="sr-only">Correo</label>
    <input id="email" name="email" class="form-control" placeholder="Email address"  autofocus="">
    <label for="password" class="sr-only">Contraseña</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" >
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Recordar
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
  </form>



@stop


















@section('superior')
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
                <li @yield('miarea')><a href="/miarea">Mi área</a></li>
              @endif
              <!-- <li @yield('servicios')><a href="/servicios">Servicios</a></li>  -->
              @if( !Auth::check() )
                <li @yield('registro')><a data-toggle="modal" data-target="#myModal" href="#">Registro</a></li>
              @endif

              <li @yield('contacto')><a href="/contacto">Contacto</a></li>
              @if( Auth::check() )
                <li>
                  <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                {{ Auth::user()->email }}
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="/miarea">Mi área</a></li>                 
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
@stop

@section('contenido')

<!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

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
    
    <div class="superior container">
    <!-- <h1>Inicio</h1>
    <h2>Mundocente</h2>  -->
    @if( !Auth::check() )
      <div class="row">
        <div class="banner col-xs-12 col-sm-12 col-md-8 col-lg-9">
          <!-- <div class="banner"> -->
            <img class="img-responsive" src="{{ URL::asset('img/carrusel/banner-1.jpg') }}">
          <!-- </div> -->
        </div>
        <div class="banner-side col-xs-12 col-sm-12 col-md-4 col-lg-3">
          <form action="{{ route('login.store') }}" method="post" class="ingreso form-horizonal">
            <!-- <fieldset> -->

            <!-- Form Name -->
            {{ csrf_field() }}
            <legend class="text-center">Ingreso</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="text-right col-md-4 control-label" for="email">Correo</label>  
              <div class="col-md-8">
              <input id="email" name="email" type="text" placeholder="Ingresa tu correo" class="form-control input-md" required="">
              <span class="help-block">correo@dominio.com</span>  
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
              <label class="text-right col-md-4 control-label" for="password">Contraseña</label>
              <div class="col-md-8">
                <input id="password" name="password" type="password" placeholder="Ingresa tu contraseña" class="form-control input-md" required="">
                <span class="help-block">Minimo 6 caracteres</span>
              </div>
            </div>

            <!-- Select Basic -->
            {{--<div class="form-group">--}}
              {{--<label class="text-right col-md-4 control-label" for="tipo-usuario">Soy</label>--}}
              {{--<div class="col-md-8">--}}
                {{--<select id="tipo-usuario" name="tipo-usuario" class="form-control">--}}
                  {{--<option value="1">Docente</option>--}}
                  {{--<option value="2">Funcionario</option>--}}
                {{--</select>--}}
              {{--</div>--}}
            {{--</div>--}}


            <!-- Button -->
            <div class="form-group col-xs-12 col-sm-12 col-md-12">
              <a class="botones control-label" href="#">Olvide mi contraseña</a>
               <button id="ingresar" name="ingresar" class="botones btn btn-primary">Ingresar</button>
            </div>

            <!-- </fieldset> -->
            </form>

        </div>
      </div>
    @endif
  </div>


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
                <form action="buscar" method="get" class="" role="search">
                  <!-- {{ csrf_field() }} -->
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
                <h3>Revistas</h3>
                <h3>Convocatorias</h3>
                <h3>Eventos</h3>
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
          
          
          <div class="contenido">
            <h1 class="titulo">Servicios</h1>
            <div class="row">     
              <div class="servicios">
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <a href="/buscar/revista">
                    <div id="revistas" class="text-center">
                      <img width="100px" src="{{ URL::asset('/img/servicios/signature.png') }}">
                      <h3>Revistas Científicas</h3>
                      <p>Ahorra tiempo conociendo las revistas científicas que a la fecha reciben artículos de tu área de interés.</p>
                    </div>
                  </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <a href="/buscar/empleo">
                    <div id="convocatorias" class="text-center">
                      <img width="100px" src="{{ URL::asset('/img/servicios/business.png') }}">
                      <h3>Convocatorias Docentes</h3>
                      <p>Entérate oportunamente sobre las oportunidades laborales del ámbito universitario y cumple con tus metas de crecimiento profesional.</p>
                    </div>
                  </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <a href="/buscar/evento">
                    <div id="eventos" class="text-center">
                      <img width="100px" src="{{ URL::asset('/img/servicios/time.png') }}">
                      <h3>Eventos Académicos</h3>
                      <p>Encuentra congresos, seminarios, conferencias y demás eventos académicos de tu interés para capacitación o presentación de tus resultados de investigación.</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>


          @if(isset($publicaciones))
            @section('contenido')
                <h1 class="text-center">Resultados de búsqueda</h1>
                <div class="lista">

                      @foreach($publicaciones as $publicacion)

                      <article class="publicacion">            
                        <div id="contenido-publicacion" class="">
                                  <h3>
                                    <a class="titulo-publicacion" href="#">{{ $publicacion->nombre }}</a>
                                  </h3>
                                  <span>
                                    <a href="#">{{ $publicacion->funcionario->establecimiento->nombre }}</a>
                                  </span>
                                  <p>{{ $publicacion->nombre }}</p>

                              </div>
                              <div id="fecha-publicacion" class="">                   
                                <div class="list-group">
                              <div>Fecha publicación: <span class="small">{{ $publicacion->fecha_publicacion }}</span></div>
                              <div>Lugar: <span class="small">{{ $publicacion->lugar->nombre }}</span></div>
                              <div>Tipo publicación: <span class="small">{{ $publicacion->type }}</span></div>      
                          </div>

                        </div>
                  
                        </article>
                        <div class="espacio">
                        
                        </div>

                      @endforeach
                    
                  </div>
            @overwrite
          @endif



        </div>
      </div>
    </div>
  </div>
@stop


@section('pie')
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


@stop
