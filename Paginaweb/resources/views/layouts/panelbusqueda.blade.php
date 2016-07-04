@extends('layouts.base')

@section('panel')

	   <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
	        Realiza una búsqueda</a>
	      </h4>
	    </div>
	    <div id="collapse1" class="panel-collapse collapse in">
	      <div class="panel-body">
	      	<div class="row">
		      <div class="col-xs-12 col-sm-12 col-md-12">
		        {{-- <form action="{{ route('busqueda.store') }}" method="post" class="" role="search"> --}}
		          <!-- {{ csrf_field() }} -->
		              <input type="hidden" name="_token" value="{{ csrf_token() }}" id="busquedatoken"/>
		              <div class="form-group">
		                <!-- <label for="buscador">Búsqueda</label> -->
		                  <input id="buscador" name="campo" type="text" class="form-control" placeholder="Ej: Docente, Inglés, Sociales..." autofocus="autofocus"></input>
		                  <!-- <h4><span class="small">Ej: Docente, Inglés, Sociales, Matemáticas</span></h4> -->
		                  <!-- <button type="submit" class="btn btn-primary">Buscar</button> -->
		              </div>
		              <!--
		              <div class="form-group">
		                <button id="buscar" type="submit" class="btn btn-primary">Buscar</button>
		              </div>
		              -->
		          {{-- </form> --}}
		        </div>
		     </div>
	        
	      </div>
	    </div>
	  </div>

	 @if(isset($filtrar))
			<div class="tipos panel panel-default">
			    <div class="panel-heading">
			      <h4 class="panel-title">
			        Buscar por tipo
			      </h4>
			    </div>
				  <div id="filtros" class="panel-body">
				     <div class="contenido-panel col-xs-12 col-sm-12 col-md-12">
				        <div class="row">
				          <div class="col-xs-12 col-sm-12 col-md-12">
				          	<ul>
					            <li>
					            	<a class="revistas" href="/busqueda/revista">
						            	<h4><img width="35px" src="{{ URL::asset('/img/servicios/signature.png') }}">
						            	Revistas<h4>
					            	</a>
					            </li>				            
					            <li>
					            	<a class="convocatorias" href="/busqueda/convocatoria">
						            	<h4><img width="35px" src="{{ URL::asset('/img/servicios/business.png') }}">
						            	Convocatorias</h4>
					            	</a>
					            </li>
					            <li>
					            	<a class="eventos" href="/busqueda/evento">
						            	<h4><img width="35px" src="{{ URL::asset('/img/servicios/time.png') }}">
						            	Eventos</h4>
					            	</a>
					            </li>
				            </ul>
				            </div>
				          </div>
				      </div>	
				  </div>		
		    </div>  				 	

	 @endif


{{--
	@if(!isset($sinfiltrar))
		    <div class="panel-group">            
			      <div class="panel panel-heading text-center col-xs-12 col-sm-12 col-md-12" role="tablist" data-toggle="collapse" data-target="#filtros">
			        <h3 class="panel-title">Filtrar búsqueda</h3>
			      </div>
				  <div id="filtros" class="panel-body collapse">
				     <div class="contenido-panel col-xs-12 col-sm-12 col-md-12">
				        <div class="row">
				          <div class="col-xs-12 col-sm-12 col-md-12">
				          	<ul>
					            <li>
					            	<a href="/busqueda/revista">
						            	<h4><img width="35px" src="{{ URL::asset('/img/servicios/signature.png') }}">
						            	Revistas<h4>
					            	</a>
					            </li>				            
					            <li>
					            	<a href="/busqueda/convocatoria">
						            	<h4><img width="35px" src="{{ URL::asset('/img/servicios/business.png') }}">
						            	Convocatorias</h4>
					            	</a>
					            </li>
					            <li>
					            	<a href="/busqueda/evento">
						            	<h4><img width="35px" src="{{ URL::asset('/img/servicios/time.png') }}">
						            	Eventos</h4>
					            	</a>
					            </li>
				            </ul>
				            </div>
				          </div>
				      </div>	
				  </div>		
		    </div>  			
	@endif

	--}}

	@if( Auth::check() )
			@include('filtro')

			<!--
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
			                  	<label for="buscador">Búsqueda</label> 
			                    <input id="buscador" name="campo" type="text" class="form-control" placeholder="Busca oportunidades...">
			                    <h4><span class="small">Ej: Docente, Inglés, Sociales, Matemáticas</span></h4>
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
			  -->
	@endif
@stop