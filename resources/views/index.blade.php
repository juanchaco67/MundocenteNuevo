@extends('layouts.panelbusqueda')

@section('titulo-pagina')
	Inicio
@stop

@section('contenido2')
	<h1>Vista Index</h1>

	 @include('alerts.errors')
   @include('alerts.request')
   @include('alerts.success')


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

    @include('alerts.request')
    @include('alerts.success')
   
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
            @include('alerts.errors')

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
@stop


@section('titulo-contenido')
  <h2 class="titulo">Servicios</h2>
@stop

@section('contenido')

<!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> 
      <div class="principal col-xs-12 col-sm-12 col-md-9">
        <div class="">
        -->         
          
          <div class="contenido">
            
            <div class="row">     
              <div class="servicios">
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <a href="/busqueda/revista">
                    <div id="revistas" class="text-center">
                      <img width="100px" src="{{ URL::asset('/img/servicios/signature.png') }}">
                      <h3>Revistas Científicas</h3>
                      <p>Ahorra tiempo conociendo las revistas científicas que a la fecha reciben artículos de tu área de interés.</p>
                    </div>
                  </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <a href="/busqueda/convocatoria">
                    <div id="convocatorias" class="text-center">
                      <img width="100px" src="{{ URL::asset('/img/servicios/business.png') }}">
                      <h3>Convocatorias Docentes</h3>
                      <p>Entérate oportunamente sobre las oportunidades laborales del ámbito universitario y cumple con tus metas de crecimiento profesional.</p>
                    </div>
                  </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <a href="/busqueda/evento">
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
                <h2 class="text-center">Resultados de búsqueda</h2>
                <div class="lista">
                  @if($publicaciones)
                    @foreach($publicaciones as $publicacion)

                        <article class="publicacion">            
                          <div id="contenido-publicacion" class="">                             
                                    <h3>
                                      <a class="titulo-publicacion" href="#">{{ $publicacion->nombre }}
                                      </a>
                                    </h3> 
                                    <span>
                                      <a href="#">{{ $publicacion->funcionario->establecimiento->nombre }}</a>
                                    </span>
                                    <p class="descripcion">{{ $publicacion->resumen }}</p>

                          </div>
                              
                              
                          <div id="fecha-publicacion" class="">                   
                            <div class="list-group">
                              <div>Fecha publicación: 
                                <span class="small">{{ $publicacion->created_at }}</span>
                              </div>
                              <div>Lugar: 
                                {{--
                                <span class="small">{{ $publicacion->lugar->nombre }}</span>
                                --}}
                              </div>
                              <div>Tipo publicación: 
                                <span class="small">{{ $publicacion->tipo }}</span>
                              </div>      
                            </div>

                          </div>
                    
                          </article>
                          <div class="espacio">
                          
                          </div>

                        @endforeach
                      @else
                        <h2 class="text-center"><span class="small">No se encontraron publicaciones</span></h2>
                      @endif
                    
                  </div>
            @overwrite
          @endif
@stop


@section('pie')

@stop
