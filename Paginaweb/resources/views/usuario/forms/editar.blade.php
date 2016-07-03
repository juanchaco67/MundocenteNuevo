@include('alerts.request')
@if(isset($user))
	<!-- <h1>Editar</h1>-->
	@if($user->idrol == 1)		
		{!!Form::model($user, ['route'=>['usuario.update', $user->id], 'method'=>'put','id'=>'formularioDocente','name'=>'formularioDocente','onsubmit'=>'return false;'])!!}
		 <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
			@include('usuario.forms.docente')

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				{!!Form::submit('Actualizar', ['id'=>'submit-editar-docente', 'class'=>'btn btn-primary'])!!}
			</div>

		{!!Form::close()!!}
		<!-- {!!Form::open(['route'=>['usuario.destroy', $user->id], 'method'=>'delete'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!} -->
	@elseif($user->idrol == 2)	

		{!!Form::model($user, ['route'=>['usuario.update', $user->id], 'method'=>'put','name'=>'formularioFuncionario','onsubmit'=>'return false;','id'=>'formularioFuncionario'])!!}
		 <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
			@include('usuario.forms.funcionario')

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				{!!Form::submit('Actualizar', ['id'=>'submit-editar-funcionario','class'=>'btn btn-primary'])!!}
			</div>
			
		{!!Form::close()!!}

	@elseif($user->idrol == 3)	

		{!!Form::model($user, ['route'=>['usuario.update', $user->id], 'method'=>'put','name'=>'formularioAdmin','onsubmit'=>'return false;','id'=>'formularioAdmin'])!!}

		<input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
			@include('usuario.forms.admin')

		<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				{!!Form::submit('Actualizar', ['id'=>'submit-editar-admin','class'=>'btn btn-primary'])!!}
		</div>

		{!!Form::close()!!}

	<!-- 	{!!Form::open(['route'=>['usuario.destroy', $user->id], 'method'=>'delete'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!} -->
	@endif

@endif