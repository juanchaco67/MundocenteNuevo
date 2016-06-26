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
		       		<li><a href="/publicacion/borradas">Borradas</a></li>
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

@stop