@extends('layouts.panelbusqueda')

@section('titulo-pagina')
	Inicio
@stop

@section('superior')

    {{--@include('alerts.request')--}}
    @include('alerts.success')
   
  <div class="row">
    
    <div class="superior container">
    <!-- <h1>Inicio</h1>
    <h2>Mundocente</h2>  -->
    @if( !Auth::check() )
      <div class="row">
            
        
      </div>


      <div class="row">
        <div class="banner col-xs-12 col-sm-12 col-md-8 col-lg-9">

          <div class="">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                  <div class="item active">
                    <img src="{{ URL::asset('img/carrusel/banner-1.jpg') }}">
                    <div class="carousel-caption">
                      <h3>Docentes</h3>
                      <p>Búsqueda de publicaciones recientes para los docentes...</p>
                    </div>
                  </div>

                  <div class="item">
                    <img src="{{ URL::asset('img/carrusel/banner-2.jpg') }}">
                    <div class="carousel-caption">
                      <h3>Universidades/Entidades</h3>
                      <p>Publicación de Revistas, Convocatorias y Eventos...</p>
                    </div>
                  </div>
                
                  <div class="item">
                    <img src="{{ URL::asset('img/carrusel/banner-3.jpg') }}">
                    <div class="carousel-caption">
                      <h3>Registrate</h3>
                      <p>Entra en mundocente y encuentra publicaciones para docentes...</p>
                    </div>
                  </div>
              
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Anterior</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Siguiente</span>
                </a>
              </div>
            </div>




          <!-- <div class="banner"> -->
            <!-- <img class="img-responsive" src="{{ URL::asset('img/carrusel/banner-1.jpg') }}"> -->
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
                  <a href="">
                    <div class="revistas text-center">
                      <img width="100px" src="{{ URL::asset('/img/servicios/signature.png') }}">
                      <h3>Revistas Científicas</h3>
                      <p>Ahorra tiempo conociendo las revistas científicas que a la fecha reciben artículos de tu área de interés.</p>
                    </div>
                  </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <a href="">
                    <div class="convocatorias text-center">
                      <img width="100px" src="{{ URL::asset('/img/servicios/business.png') }}">
                      <h3>Convocatorias Docentes</h3>
                      <p>Entérate oportunamente sobre las oportunidades laborales del ámbito universitario y cumple con tus metas de crecimiento profesional.</p>
                    </div>
                  </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <a href="">
                    <div class="eventos text-center">
                      <img width="100px" src="{{ URL::asset('/img/servicios/time.png') }}">
                      <h3>Eventos Académicos</h3>
                      <p>Encuentra congresos, seminarios, conferencias y demás eventos académicos de tu interés para capacitación o presentación de tus resultados de investigación.</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>


          @include('reviews')
@stop


@section('pie')

@stop
