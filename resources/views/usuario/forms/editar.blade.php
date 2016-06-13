@include('alerts.request')
@if(isset($user))
	<h1>Editar</h1>
	@if($user->idrol == 1)		
		{!!Form::model($user, ['route'=>['usuario.update', $user->id], 'method'=>'put','id'=>'formulario','name'=>'fo'])!!}
		 <input type="hidden" name="_token" value="{{csrf_token()}}" id="tokenn"/>
			@include('usuario.forms.docente')

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				{!!Form::submit('Actualizar', ['id'=>'actualizarDocente', 'class'=>'btn btn-primary'])!!}
			</div>

		{!!Form::close()!!}

		<!-- {!!Form::open(['route'=>['usuario.destroy', $user->id], 'method'=>'delete'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!} -->
	@elseif($user->idrol == 2)
		{!!Form::model($user, ['route'=>['usuario.update', $user->id], 'method'=>'put','name'=>'fo'])!!}
			@include('usuario.forms.funcionario')

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				{!!Form::submit('Actualizar', ['id'=>'actualizarFuncionario','class'=>'btn btn-primary'])!!}
			</div>
			
		{!!Form::close()!!}

	<!-- 	{!!Form::open(['route'=>['usuario.destroy', $user->id], 'method'=>'delete'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!} -->
	@endif

@endif