<input name="rol" value="funcionario" hidden></input>
<h3>Registro de Publicadores</h3>
<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
@include('usuario.forms.registro')
	@if(isset($establecimientos))
		<legend>Universidad/Entidad</legend>
	  	<fieldset>
	      	<div class="form-group">
			  <label for="sel1">Pertenezco a:</label>
			  <select name="establecimiento" class="form-control" id="sel1">
				@foreach($establecimientos as $establecimiento)
					@if(!isset($user))
				    	<option value="{{ $establecimiento->id }}">{{ $establecimiento->nombre }}</option>
				    @else
				    	@if($user->funcionario->establecimiento_id === $establecimiento->id)
				    		<option value="{{ $establecimiento->id }}" selected>{{ $establecimiento->nombre }}</option>
				    	@else
				    		<option value="{{ $establecimiento->id }}">{{ $establecimiento->nombre }}</option>   		
				    	@endif
				    @endif
				@endforeach
			  </select>
			</div>
	  	</fieldset>
	@endif
@if(isset($user))
	<div class="form-group">
		<label for="desactivar">Desactivar esta cuenta</label>
		@if($user->estado === 'inactivo')
			<input name="desactivar" value="desactivar" type="checkbox" checked></input>
		@else
			<input name="desactivar" value="desactivar" type="checkbox"></input>
		@endif
	</div>
@endif
