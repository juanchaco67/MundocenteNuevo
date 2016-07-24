@include('alerts.request')
@if(isset($usuario))
	<!-- <h1>Editar</h1>-->
	@if($usuario->idrol == 1)
	
		{!!Form::model($usuario, ['route'=>['usuario.update', $usuario->id], 'method'=>'put','class'=>'formularioUpdateDocente','name'=>'formularioDocente','onsubmit'=>'return false;'])!!}
		 <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
			@include('usuario.forms.docente')

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				{!!Form::submit('Actualizar', ['class'=>'submit-editar-docente btn btn-primary', 'title'=>'Modificar datos de la cuenta'])!!}
			</div>

		{!!Form::close()!!}
		{{--
			{!!Form::open(['route'=>['usuario.destroy', $usuario->id], 'method'=>'delete'])!!}
				{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
			{!!Form::close()!!} 
		--}}
	@elseif($usuario->idrol == 2)	

		{!!Form::model($usuario, ['route'=>['usuario.update', $usuario->id], 'method'=>'put','name'=>'formularioFuncionario','onsubmit'=>'return false;','class'=>'formularioUpdateFuncionario'])!!}
		 <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>

			@include('usuario.forms.funcionario')

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				{!!Form::submit('Actualizar', ['class'=>'submit-editar-funcionario btn btn-primary', 'title'=>'Modificar datos de la cuenta'])!!}
			</div>
			
		{!!Form::close()!!}

	@endif

@endif