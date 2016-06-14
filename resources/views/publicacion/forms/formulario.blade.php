<div class="form-group">
	{!!Form::label('Nombre')!!}
	{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de la publicación'])!!}
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
	{!!Form::label('Fecha cierre')!!}
	{!!Form::date('fecha_cierre', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::label('Aplica para')!!}
	@if(isset($areas))
		@foreach($areas as $area)
			@if(in_array($area->id, $areas_publicacion))
				<div class="form-group">
					<input id="{{ $area->nombre }}" type="checkbox" name="areas[]" value="{{ $area->id }}" checked><label for="{{ $area->nombre }}">{{ $area->nombre }}</label></input>
				</div>
			@else
				<div class="form-group">
					<input id="{{ $area->nombre }}" type="checkbox" name="areas[]" value="{{ $area->id }}"><label for="{{ $area->nombre }}">{{ $area->nombre }}</label></input>
				</div>
			@endif
		@endforeach
	@else
		<h1>Sin areas</h1>
	@endif
</div>
