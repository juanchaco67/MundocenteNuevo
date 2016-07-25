@include('alerts.request')
@if(isset($usuario))
	<!-- <h1>Editar</h1>-->
	@if($usuario->idrol == 1)
	
	@if(Auth::check() && Auth::user()->idrol == 3)
		{!!Form::model($usuario, ['route'=>['usuario.update', $usuario->id], 'method'=>'put'])!!}
	@else
		{!!Form::model($usuario, ['route'=>['usuario.update', $usuario->id], 'method'=>'put','class'=>'formularioUpdateDocente','name'=>'formularioDocente','onsubmit'=>'return false;'])!!}
	@endif
		 <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
			@include('usuario.forms.docente')

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				@if(Auth::check() && Auth::user()->idrol == 3)
					{!!Form::submit('Actualizar', ['class'=>'btn btn-primary', 'title'=>'Modificar datos de la cuenta'])!!}
				@else
					{!!Form::submit('Actualizar', ['class'=>'submit-editar-docente btn btn-primary', 'title'=>'Modificar datos de la cuenta'])!!}
				@endif
			</div>

		{!!Form::close()!!}
		{{--
			{!!Form::open(['route'=>['usuario.destroy', $usuario->id], 'method'=>'delete'])!!}
				{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
			{!!Form::close()!!} 
		--}}
	@elseif($usuario->idrol == 2)	
		@if(Auth::check() && Auth::user()->idrol == 3)
			{!!Form::model($usuario, ['route'=>['usuario.update', $usuario->id], 'method'=>'put'])!!}
		@else
			{!!Form::model($usuario, ['route'=>['usuario.update', $usuario->id], 'method'=>'put','name'=>'formularioFuncionario','onsubmit'=>'return false;','class'=>'formularioUpdateFuncionario'])!!}
		@endif
		 <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>

			@include('usuario.forms.funcionario')

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				@if(Auth::check() && Auth::user()->idrol == 3)
					{!!Form::submit('Actualizar', ['class'=>'btn btn-primary', 'title'=>'Modificar datos de la cuenta'])!!}
				@else
					{!!Form::submit('Actualizar', ['class'=>'submit-editar-funcionario btn btn-primary', 'title'=>'Modificar datos de la cuenta'])!!}
				@endif
			</div>
			
		{!!Form::close()!!}

	@endif

@endif