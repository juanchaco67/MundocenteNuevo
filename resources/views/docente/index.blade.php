@extends('layouts.base')

@section('titulo-pagina')
	Mi área
@stop

@section('contenido')
	<h1>Bienvenido docente</h1>
	{{-- @if(isset($publicaciones))
		@foreach($publicaciones as $publicacion)
			<h1>{{ $publicacion->nombre }}</h1>
			<p>{{ $publicacion->descripcion }}</p>
		@endforeach
	@endif
	--}}




	@if(isset($publicaciones))
            @section('contenido')
                <h1 class="text-center">Publicaciones de Mi área</h1>
                <div class="lista">

                      @foreach($publicaciones as $publicacion)

                      <article class="publicacion">            
                        <div id="contenido-publicacion" class="">                             
                                  <h3>
                                    <a class="titulo-publicacion" href="#">{{ $publicacion->nombre }}
                                    </a>
                                  </h3>
                                  {{--     
                                  <span>
                                    <a href="#">{{ $publicacion->funcionario->establecimiento->nombre }}</a>
                                  </span>
                                  <p>{{ $publicacion->nombre }}</p>
                                  --}}
                                  <p>{{ $publicacion->descripcion }}</p>

                              </div>
                            
                            {{--
                              <div id="fecha-publicacion" class="">                   
                                <div class="list-group">
                              <div>Fecha publicación: <span class="small">{{ $publicacion->fecha_publicacion }}</span></div>
                              <div>Lugar: <span class="small">{{ $publicacion->lugar->nombre }}</span></div>
                              <div>Tipo publicación: <span class="small">{{ $publicacion->type }}</span></div>      
                          </div>

                        </div>

                        --}}
                  
                        </article>
                        <div class="espacio">
                        
                        </div>

                      @endforeach
                    
                  </div>
            @overwrite
          @endif
@stop