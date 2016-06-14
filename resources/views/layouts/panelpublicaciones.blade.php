@extends('layouts.base')

@section('titulo-contenido')
	<h2 class="titulo">Mis publicaciones</h2>
@stop

@section('panel')
	<div class="">
	  <div class="titulo-panel text-center col-xs-12 col-sm-12 col-md-12">
	    <h4>Bienvenido</h4>
	  </div>
	  <div class="contenido-panel col-xs-12 col-sm-12 col-md-12">
	    <div class="row">
	      <div class="col-xs-12 col-sm-12 col-md-12">
		      <div type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Simple collapsible</div>
			  <div id="demo" class="collapse">
			    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
			    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			  </div>
	           	<ul>
		       		<li><a href="/publicacion/create">Nueva</a></li>
		       		<li><a href="/publicacion/">Listar</a></li>
		       	</ul>
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