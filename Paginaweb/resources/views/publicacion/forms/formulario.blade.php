@if(Auth::check() && Auth::user()->idrol == 3)

	@if(isset($publicadores))
		@if($publicadores)
			<div class="form-group col-md-12">
				{!!Form::label('Publicador')!!}
				<select name="publicador" class="form-control">
					@foreach($publicadores as $publicador)
						{{--<h3>{{$publicador->user->name}}</h3>--}}
						<option value="{{$publicador->id}}">{{$publicador->user->name}}</option>
					@endforeach
				</select>
			</div>
		@else
			<h3>No existen publicadores</h3>
		@endif
	@endif
@endif

<div class="form-group col-md-6">
	{!!Form::label('Nombre')!!}
	{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de la publicación'])!!}
</div>
<div class="form-group col-md-6">
	{!!Form::label('Resumen')!!}
	{!!Form::text('resumen', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el resumen de la publicación'])!!}
</div>
<div class="form-group col-md-6">
	{!!Form::label('Descripcion')!!}
	{!!Form::textarea('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Ingresa la descripción de la publicación'])!!}
</div>
<div class="form-group col-md-6">
	{!!Form::label('Url')!!}
	{!!Form::text('url', null, ['class'=>'form-control', 'placeholder'=>'Ingresa la descripción de la publicación'])!!}
</div>
<div class="form-group col-md-6">
	{!!Form::label('Tipo')!!}
	{!!Form::select('tipo', array('revista' => 'Revista', 'convocatoria' => 'Convocatoria', 'evento' => 'Evento'), null, ['class'=>'form-control'])!!}
</div>
<div class="form-group col-md-12">

	{!!Form::label('Lugar')!!}
	@if(isset($departamentos))
	
		<div class="form-group">

			<select  id="lugar" class="form-control">
				@foreach($departamentos as $departamento)
					<optgroup label="{{$departamento->nombre}}">
					@if(!isset($user))
					
  					
				    @else
				    	@foreach($ciudades as $ciudad)
  						@if($ciudad->ubicacion_id==$departamento->id)
  						<option value="{{ $ciudad->id }}" name="{{$ciudad->nombre}}">{{$ciudad->nombre}}</option>
					    
					 	@endif
				    	@endforeach
				    
				    	
				    	--}}
				    @endif
				     </optgroup>
				@endforeach
			  </select>
		</div>
	@else
		<h6>No hay lugares</h6>
	@endif
</div>
@if(isset($verificar))
<div class="scrollbar municipios-scroll" id="style-1" style="display:inline-block;">
	<div id="municipios" class="force-overflow" style="display:inline-block; width:100%; height:50px;">
	@foreach($ciudades_selecciondas as $ciudades)
	  <div style="height:1px;display:inline-block;position:relative;" class="alert alert-success"><span style="position:relative;bottom:10px;">{{$ciudades->nombre}}</span><a style="position:absolute;left:90%;top:0%;" href="#" id="{{$ciudades->id}}" class="eliminar-lugar close" data-dismiss="alert" aria-label="close">&times;</a></div>
	  <input type="hidden" name="lugar[]" class="eliminar-hidden" id="hidden{{$ciudades->id}}" value="{{$ciudades->id}}"/>
	 
	@endforeach
</div>	    
</div>	 	
 @else
<div class="scrollbar municipios-scroll" id="style-1" style="display:none;">
	<div id="municipios" class="force-overflow" style="display:none; width:100%; height:50px;">
	 
	 </div>
 </div>
 	@endif

<div class="col-md-12">
	@if(isset($fecha_publicacion))
		<div class="form-group col-md-6">
			<label for="fecha_publicacion">Fecha publicacion</label>
			{!!Form::date('fecha_publicacion', $fecha_publicacion, ['class' => 'form-control'])!!}
		</div>
	@else
		<div class="form-group col-md-6">
			<label for="fecha_publicacion">Fecha publicacion</label>
			{!!Form::date('fecha_publicacion', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
		</div>
	@endif

	@if(isset($fecha_cierre))
		<div class="form-group col-md-6">
			<label for="fecha_cierre">Fecha cierre</label>
			{!!Form::date('fecha_cierre', $fecha_cierre, ['class' => 'form-control'])!!}
		</div>
	@else
		<div class="form-group col-md-6">
			<label for="fecha_cierre">Fecha cierre</label>
			{!!Form::date('fecha_cierre', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
		</div>
	@endif
</div>

<div class="form-group col-md-12">
	{!!Form::label('Aplica para')!!}
	@if(isset($areas))
	<select  id="area-publicacion" class="form-control">
	@foreach($areas as $area)
  		<option value="{{$area->id}}" name="{{$area->nombre}}">{{$area->nombre}}</option>
	@endforeach

	</select>

		
	@else
		<h1>Sin areas</h1>
	@endif
</div>


@if(isset($verificar))
<div class="scrollbar areas-aparecer-scroll" id="style-1" style="display:inline-block;">
	<div id="areas-aparecer" class="force-overflow" style="display:inline-block; width:100%; height:50px;">
	@foreach($areas as $area)

		@if(in_array($area->id, $areas_usuario))

					 <div style="height:1px;display:inline-block;position:relative;" class="alert alert-success"><span style="position:relative;bottom:10px;">{{$area->nombre}}</span><a style="position:absolute;left:90%;top:0%;" href="#" id="area-aparecer{{$area->id}}" class="eliminar-area close" data-dismiss="alert" aria-label="close">&times;</a></div>
				 <input type="hidden" name="areas[]" class="areas-eliminar-hidden" id="hidden-areas-{{$area->id}}" value="{{$area->id}}"/>	
			@endif
	@endforeach
</div>	
</div>	    	
 @else
<div class="scrollbar areas-aparecer-scroll" id="style-1" style="display:none;">
	<div id="areas-aparecer" class="force-overflow" style="display:none; width:100%; height:50px;">
	 
	 </div>
 </div>
 	@endif