@extends('layouts.base')

@section('titulo-pagina')
	Inicio
@stop

@section('contenido')
	<h1>Vista Index</h1>

	 @include('alerts.errors')
     @include('alerts.request')

	<form action="{{ route('login.store') }}" method="post" class="form-signin">
		{{ csrf_field() }}
        <h2 class="form-signin-heading">Ingresar</h2>
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


	<form class="form-group">
		<label>Buscar</label>
		<input class="form-control"type="text"></input>
	</form>
	<input class="btn btn-primary" type="button" value="Buscar"></input>
@stop