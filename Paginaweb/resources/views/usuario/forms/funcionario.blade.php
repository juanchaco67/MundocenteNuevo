<input name="rol" value="funcionario" hidden></input>
@include('usuario.forms.registro')
	@if(isset($establecimientos))
		<legend>Universidad/Entidad</legend>
	  	<fieldset>
	      	<div class="form-group">
			  <label for="sel1">Pertenezco a:</label>
			  <select name="establecimiento" class="form-control" id="sel1">
				@foreach($establecimientos as $establecimiento)
					@if(!isset($usuario))
				    	<option value="{{ $establecimiento->id }}">{{ $establecimiento->nombre }}</option>
				    @else
				    	@if($usuario->funcionario)
					    	@if($usuario->funcionario->establecimiento_id == $establecimiento->id)
					    		<option value="{{ $establecimiento->id }}" selected>{{ $establecimiento->nombre }}</option>
					    	@else
					    		<option value="{{ $establecimiento->id }}">{{ $establecimiento->nombre }}</option>   		
					    	@endif
					    @endif
				    @endif
				@endforeach
			  </select>
			</div>
	  	</fieldset>
	@endif
@if(isset($usuario))
	<div class="form-group">
		<label for="desactivar">Desactivar esta cuenta</label>
		@if($usuario->estado === 'inactivo')
			<input name="desactivar" id="desactivar" value="desactivar" type="checkbox" checked></input>
		@else
			<input name="desactivar" id="desactivar" value="desactivar" type="checkbox"></input>
		@endif
	</div>
@endif