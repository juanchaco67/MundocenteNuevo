@if(isset($publicaciones))
    {{-- @section('contenido') --}}
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
                      
                      
                  <div id="fecha-publicacion" class="{{ $publicacion->tipo }}">                   
                    <div class="list-group">
                      <div>Fecha publicación: 
                        <span class="small">{{ $publicacion->created_at }}</span>
                      </div>
                      <div>Lugar: 
                        <span class="small">{{ $publicacion->lugar->nombre }}</span>
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
    {{-- @overwrite --}}
  @endif