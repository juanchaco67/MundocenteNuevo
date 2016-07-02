{!!Form::model($user, ['route'=>['usuario.update', $user->id], 'method'=>'put','id'=>'formularioDocente','name'=>'formularioDocente','onsubmit'=>'return false;'])!!}
 <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
	@include('usuario.forms.docente')

	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		{!!Form::submit('Actualizar', ['id'=>'submit-editar-docente', 'class'=>'btn btn-primary'])!!}
	</div>

{!!Form::close()!!}