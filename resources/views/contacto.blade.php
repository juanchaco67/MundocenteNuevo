@extends('layouts.panelbusqueda')

@section('titulo-pagina')
	Contacto
@stop

@section('titulo-contenido')
	<h2 class="titulo">Contacto</h2>
@stop

@section('contenido')
	<div class="">
		<h3 id="contacto-info" class="text-center">Contamos con el mejor equipo para resolver todas sus dudas.</h3>
		<div id="contacto-izquierdo">
				<form role="form" action="/" method="post">
					{{ csrf_field() }}
				  	<h4>Dejanos tu sugerencia</h4>
				  	<div class="form-group">
					    <label for="name">Nombre</label>
					    <input name="name" type="text" class="form-control" id="name" placeholder="Ingresa tu nombre" autofocus="autofocus">
					  </div>
				  	<div class="form-group">
					    <label for="email">Correo</label>
					    <input name="email" type="email" class="form-control" id="email" placeholder="Ingresa tu correo">
					  </div>
				  	<div class="form-group">
					    <label for="asunto">Asunto</label>
					    <input name="asunto" type="asunto" class="form-control" id="asunto" placeholder="Ingresa el asunto">
				  	</div>
				  	<div class="form-group">
					    <label for="mensaje">Mensaje</label>
					    <textarea name="mensaje" cols="50" rows="5" style="max-width: 300px" class="form-control" id="mensaje" placeholder="Escribe aquí tu Mensaje"></textarea>
				  	</div>
				  	<div class="form-group">
				  		<button type="submit" class="btn btn-primary">Enviar</button>
				  	</div>
				  	
				</form>			
		</div>
		<div id="contacto-derecho">
			<div id="encuentranos">
				<h4>Encuentranos</h4>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.247671577915!2d-73.36204848568532!3d5.530230135447013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6a7dd297720937%3A0xae08a35864347103!2sCl.+18+%237-43%2C+Tunja%2C+Boyac%C3%A1!5e0!3m2!1ses-419!2sco!4v1462586696397" width="100%" height="50%" frameborder="0" style="border:0">
				</iframe>
				<ul>
					<li><a href="#">Direccion: Tunja - Boyacá (Colombia), Calle 18 No.7-43</a></li>
					<li><a href="#">Telefono: + 57 3163961359</a></li>
					<li><a href="#">Email: contacto@mundocente.co</a></li>
					<li><a href="#">Website: http://mundocente.pythonanywhere.com/</a></li>
				</ul>		
			</div>	
		</div>
	</div>

<!--
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.247671577915!2d-73.36204848568532!3d5.530230135447013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6a7dd297720937%3A0xae08a35864347103!2sCl.+18+%237-43%2C+Tunja%2C+Boyac%C3%A1!5e0!3m2!1ses-419!2sco!4v1462586586827" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

	-->
@stop