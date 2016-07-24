<input name="rol" value="docente" id="rol"  hidden></input>
@include('usuario.forms.registro')
<div class="form-group">
		<label for="notificar">Recibir notificaciones</label>
		@if(isset($usuario))
			@if($usuario->docente)
				@if($usuario->docente->notificar === 0)
					{!!Form::checkbox('notificar', '1', true,array('class'=>'campo_checkbox','name'=>'notificar'))!!}
				@else
					{!!Form::checkbox('notificar', '1', false,array('class'=>'campo_checkbox','name'=>'notificar'))!!}
				@endif
			@endif
		@else
			{!!Form::checkbox('notificar', '0', true,array('class'=>'campo_checkbox','name'=>'notificar'))!!}
		@endif
	</div>		
			
	<div class="form-group">
			@if(isset($areas))
			<legend>Areas de interés</legend>					
			<select  id="area-publicacion-docente" class="form-control">
				@foreach($areas as $area)
		  		<option value="{{$area->id}}" name="{{$area->nombre}}">{{$area->nombre}}</option>
				@endforeach
			</select>		
			@else
			<h1>Sin areas</h1>
			@endif					
	</div>				

@if(isset($verificar))
<div id="areas-aparecer-docente" style="width:100%;" >
	@foreach($areas as $area)

		@if(in_array($area->id, $areas_publicacion))
					<div style="height:1px;display:inline-block;position:relative;" class="alert alert-success"><span style="position:relative;bottom:10px;">{{$area->nombre}}</span><a style="position:absolute;left:90%;top:0%;" href="#" id="area-aparecer-docente{{$area->id}}" class="eliminar-docente close" data-dismiss="alert" aria-label="close">&times;</a></div>
					 <input type="hidden" name="areas[]" class="areas-eliminar-hidden" id="hidden-docente-{{$area->id}}" value="{{$area->id}}"/>
			
				@endif
	@endforeach

</div>	    	
 @else
<div id="areas-aparecer-docente" style="display:none; width:100%;" >

</div>
 @endif
	
@if(isset($usuario))
	@if($usuario->estado == "activo")
		<div class="form-group">
			<label for="desactivar">Desactivar esta cuenta</label>
			@if($usuario->estado === 'inactivo')
				<input name="desactivar" id="" value="desactivar" type="checkbox" checked></input>
			@else
				<input name="desactivar" id="desactivar" value="desactivar" type="checkbox"></input>
			@endif
		</div>
	@else
		<div class="form-group">
			<label for="activar">Activar esta cuenta</label>
			@if($usuario->estado === 'activo')
				<input name="activar" id="" value="activar" type="checkbox" checked></input>
			@else
				<input name="activar" id="activar" value="activar" type="checkbox"></input>
			@endif
		</div>
	@endif
{{--
	@if($usuario->estado === 'activo')
		<div class="form-group">	
			<label for="desactivar">Desactivar esta cuenta</label>
			@if($usuario->estado === 'inactivo')
				<input id="desactivar" name="desactivar" value="desactivar" type="checkbox" checked></input>
			@else
				<input id="desactivar" name="desactivar" value="desactivar" type="checkbox"></input>
			@endif
		</div>
	@endif
--}}
@endif
