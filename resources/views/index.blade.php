@extends('layouts.base')

@section('titulo-pagina')
	Inicio
@stop

@section('contenido')
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