<div class="container">
  <h2>Registro</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#docentes">Docentes</a></li>
    <li><a data-toggle="tab" href="#funcionarios">Publicadores</a></li>
  </ul>

  <div class="tab-content">
    <div id="docentes" class="tab-pane fade in active">
      <h3>Registro de Docentes</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      @include('usuario.forms.registro')
      <div class="form-group">
		<legend>Areas de interés</legend>
		<fieldset>
			@if(!isset($areas_usuario))
				@if(isset($areas))
					@foreach($areas as $area)				
						<div class="form-group">
							<input id="{{ $area->nombre }}" type="checkbox" name="areas[]" value="{{ $area->id }}"><label for="{{ $area->nombre }}">{{ $area->nombre }}</label></input>
						</div>
					@endforeach
				@endif
			@else
				@if(isset($areas))
					@foreach($areas as $area)
						@if(in_array($area->id, $areas_usuario))
							<div class="form-group">
								<input id="{{ $area->nombre }}" type="checkbox" name="areas[]" value="{{ $area->id }}" checked><label for="{{ $area->nombre }}">{{ $area->nombre }}</label></input>
							</div>
						@else
							<div class="form-group">
								<input id="{{ $area->nombre }}" type="checkbox" name="areas[]" value="{{ $area->id }}"><label for="{{ $area->nombre }}">{{ $area->nombre }}</label></input>
							</div>
						@endif
					@endforeach
				@endif
			@endif
		</fieldset>
	</div>
    </div>
    <div id="funcionarios" class="tab-pane fade">
      <h3>Registro de Publicadores</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      @include('usuario.forms.registro')
      	@if(isset($establecimientos))
      		<legend>Universidad/Entidad</legend>
	      	<fieldset>

	      		
	      	</fieldset>
      	@endif     


    </div>
  </div>
</div>
