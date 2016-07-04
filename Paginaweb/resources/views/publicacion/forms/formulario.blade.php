<div class="form-group">
	{!!Form::label('Nombre')!!}
	{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de la publicación'])!!}
</div>
<div class="form-group">
	{!!Form::label('Resumen')!!}
	{!!Form::text('resumen', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el resumen de la publicación'])!!}
</div>
<div class="form-group">
	{!!Form::label('Descripcion')!!}
	{!!Form::text('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Ingresa la descripción de la publicación'])!!}
</div>
<div class="form-group">
	{!!Form::label('Tipo')!!}
	{!!Form::select('tipo', array('revista' => 'Revista', 'convocatoria' => 'Convocatoria', 'evento' => 'Evento'), null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::label('Lugar')!!}
	@if(isset($lugares))
		<div class="form-group">
			<select name="lugar" class="form-control">
				@foreach($lugares as $lugar)
					@if(!isset($user))
				    	<option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
				    @else
				    	@if($publicacion->lugar_id === $lugar->id)
				    		<option value="{{ $lugar->id }}" selected>{{ $lugar->nombre }}</option>
				    	@else
				    		<option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>   		
				    	@endif
				    @endif
				@endforeach
			  </select>
		</div>
	@else
		<h6>No hay lugares</h6>
	@endif
</div>
<div class="form-group">
	{!!Form::label('Fecha cierre')!!}
	{!!Form::date('fecha_cierre', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::label('Aplica para')!!}
	@if(isset($areas))
		<div class="barra-scroll">
			@foreach($areas as $area)
				@if(in_array($area->id, $areas_publicacion))
					<div class="form-group">
						<input id="area{{ $area->id }}" type="checkbox" name="areas[]" value="{{ $area->id }}" checked><label for="area{{ $area->id }}">{{ $area->nombre }}</label></input>
					</div>
				@else
					<div class="form-group">
						<input id="area{{ $area->id }}" type="checkbox" name="areas[]" value="{{ $area->id }}"><label for="area{{ $area->id }}">{{ $area->nombre }}</label></input>
					</div>
				@endif
			@endforeach
		</div>
	@else
		<h1>Sin areas</h1>
	@endif
</div>
