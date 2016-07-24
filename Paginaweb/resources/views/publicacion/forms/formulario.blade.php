@if(Auth::check() && Auth::user()->idrol == 3)

	@if(isset($publicadores))
		@if($publicadores)
			<div class="form-group">
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
	{!!Form::label('Url')!!}
	{!!Form::text('url', null, ['class'=>'form-control', 'placeholder'=>'Ingresa la descripción de la publicación'])!!}
</div>
<div class="form-group">
	{!!Form::label('Tipo')!!}
	{!!Form::select('tipo', array('revista' => 'Revista', 'convocatoria' => 'Convocatoria', 'evento' => 'Evento'), null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">

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
<div id="municipios" style="width:100%;" >
	@foreach($ciudades_selecciondas as $ciudades)
	  <div style="width:15%;height:1px;display:inline-block;position:relative;" class="alert alert-success"><span style="position:absolute; top:10%;">{{$ciudades->nombre}}</span><a style="position:absolute;left:95%;top:0%;" href="#" id="{{$ciudades->id}}" class="eliminar-lugar close" data-dismiss="alert" aria-label="close">&times;</a></div>
	  <input type="hidden" name="lugar[]" class="eliminar-hidden" id="hidden{{$ciudades->id}}" value="{{$ciudades->id}}"/>
	 
	@endforeach
</div>	    	
 @else
<div id="municipios" style="display: none; width:100%;" >

</div>
 	@endif
<div class="form-group">
	{!!Form::label('Fecha inicio')!!}
	{!!Form::date('fecha_inicio', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::label('Fecha cierre')!!}
	{!!Form::date('fecha_cierre', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
</div>
<div class="form-group">
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
<div id="areas-aparecer" style="width:100%;" >
	@foreach($areas as $area)

		@if(in_array($area->id, $areas_usuario))
					 <div style="width:15%;height:1px;display:inline-block;position:relative;" class="alert alert-success"><span style="position:absolute; top:10%;">{{$area->nombre}}</span><a style="position:absolute;left:95%;top:0%;" href="#" id="area-aparecer{{$area->id}}" class="eliminar-area close" data-dismiss="alert" aria-label="close">&times;</a></div>
				 <input type="hidden" name="areas[]" class="areas-eliminar-hidden" id="hidden-areas-{{$area->id}}" value="{{$area->id}}"/>

	
			@endif
	@endforeach

</div>	    	
 @else
<div id="areas-aparecer" style="display:none; width:100%;" >

</div>
 	@endif