@extends('layouts.base')

@section('panel')
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
	                  <input id="buscador" name="campo" type="text" class="form-control" placeholder="Ej: Docente, Inglés, Sociales..." autofocus="autofocus">
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

	    <div class="panel-group">            
		      <div class="panel panel-heading text-center col-xs-12 col-sm-12 col-md-12" role="tablist" data-toggle="collapse" data-target="#filtros">
		        <h3 class="panel-title">Filtrar búsqueda</h3>
		      </div>
			  <div id="filtros" class="panel-body collapse">
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
	                  <!-- <label for="buscador">Búsqueda</label> 
	                    <input id="buscador" name="campo" type="text" class="form-control" placeholder="Busca oportunidades...">
	                    -->
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
@stop