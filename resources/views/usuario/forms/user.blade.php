<div class="container">
  	<h2>Registro</h2>
  	<ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#docentes">Docentes</a></li>
    	<li><a data-toggle="tab" href="#funcionarios">Publicadores</a></li>
  	</ul>

  	<div class="tab-content">
    	<div id="docentes" class="tab-pane fade in active">
    		@include('alerts.request')
    		{!!Form::open(['route'=>'usuario.store', 'method'=>'post'])!!}
      			@include('usuario.forms.docente')
      		{!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
      		{!!Form::close()!!}
    	</div>
	    <div id="funcionarios" class="tab-pane fade">
	    	@include('alerts.request')
	    	{!!Form::open(['route'=>'usuario.store', 'method'=>'post'])!!}
	    		@include('usuario.forms.funcionario')
	    	{!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
	    	{!!Form::close()!!}
	    </div>
  	</div>
</div>
