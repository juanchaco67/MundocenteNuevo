@if(isset($publicaciones))
    {{-- @section('contenido') --}}
          @if($publicaciones)
<!--
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <a>
                    <div class="revistas text-center">
                      <img width="100px" src="{{ URL::asset('/img/servicios/signature.png') }}">
                    </div>
                  </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <a class="convocatorias">
                    <div class="convocatorias text-center">
                      <img width="100px" src="{{ URL::asset('/img/servicios/business.png') }}">
                    </div>
                  </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <a class="eventos">
                    <div class="eventos text-center">
                      <img width="100px" src="{{ URL::asset('/img/servicios/time.png') }}">
                    </div>
                  </a>
                </div>
-->

  <!--
            <div class="modal fade" id="modalpublicacion" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 id="titulo-principal" class="modal-title text-center"></h4>
                    </div>
                    <div class="modal-body text-center">
                      <h4 id="titulo-secundario"></h4>
                        <h5><p id="descripcion"></p>
                        </h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            -->
              <!-- Modal -->
                <div class="modal fade" id="modalpublicacion" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Detalle de publicación</h4>
                      </div>
                      <div class="modal-body">
                        
                        <div style="width: 100%;"> 
                          <div style="float: left; width:60%;">

                            <div class="panel panel-default">
                              <div class="panel-heading text-center">
                                  Sobre la publicación
                              </div>
                              <div class="panel-body">
                                <p><strong>Nombre </strong><div id="nombre"></div></p>
                                <p><strong>Universidad/Entidad </strong><div id="universidad"></div></p>
                                <p><strong>Descripción </strong><div id="descripcion"></div></p>

                                <!-- <p><strong>Areas </strong><div id="areaa"></div></p> -->
                              </div>

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading text-center">
                                    Areas a las que aplica
                                </div>
                                  <div class="panel-body">
                                    <p><div id="areaa"></div></p>
                                  </div>

                                </div>
                              </div>

                          <div style="float: left; width:40%;">

                             <div class="panel panel-default">
                                <div class="panel-heading text-center">
                                    Resumen publicacion
                                </div>
                                
                                <div class="panel-body">
                                  <p><strong>Resumen </strong><div id="resumen"></div></p>
                                  <p><strong>Fecha publicación</strong><div id="fecha"></div></p>
                                  <p><strong>Fecha cierre </strong><div id="fechacierre"></div></p>
                                  <p><strong>Lugar </strong><div id="lugar"></div></p>
                                  <p><strong>Tipo </strong><div id="tipo"></div></p>
                                </div>          
                            </div>  

                          </div>

                      </div>

                      <div style="clear:both;">
                        
                      </div>





                      </div>
                      <div class="modal-footer">
                        <button id="cerrardetalle" type="button" class="btn btn-default" data-dismiss="modal" autofocus="autofocus">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



            <h3 class="text-center">Resultados de búsqueda</h3>
            <h3 class="text-center"><span class="small"> {{ $publicaciones->count() }} publicaciones encontradas  </span></h3>
            <div class="lista">
            @foreach($publicaciones as $publicacion)

                @if($publicacion->estado == 'activa')
                  <div id="{{ $publicacion->id }}" data-toggle="modal" data-target="#modalpublicacion" class="publicacion">            
                    <div id="contenido-publicacion" class="informacion">                             
                        <h3>
                          <a class="titulo-publicacion">{{ $publicacion->nombre }}
                          </a>
                        </h3> 
                        <span>
                          <a>{{ $publicacion->funcionario->establecimiento->nombre }}</a>
                        </span>
                        <p class="descripcion">{{ $publicacion->resumen }}</p>

                        <a href="{{ $publicacion->url }}">{{ $publicacion->url }}</a>
                    </div>
                        
                        
                    <div id="fecha-publicacion" class="{{ $publicacion->tipo }}">                   
                      <div class="list-group">
                        <div>Fecha publicación: 
                          <span class="small">{{ $publicacion->fecha_inicio }}</span>
                        </div>
                        <div>Lugar: 
                          {{-- <span class="small">{{ $publicacion->lugar->nombre }}</span> --}}
                        </div>
                        <div>Tipo publicación: 
                          <span class="small">{{ $publicacion->tipo }}</span>
                        </div>      
                      </div>

                    </div>
              
                    </div>
                    <div class="espacio">
                    </div>

                  @endif

                @endforeach
                </div>
              @else
                <h2 class="text-center"><span class="small">No se encontraron publicaciones</span></h2>
              @endif
    {{-- @overwrite --}}
  @endif