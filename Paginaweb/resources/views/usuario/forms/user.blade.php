<div class="">
 
  	<ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#docentes">Docentes</a></li>
    	<li><a data-toggle="tab" href="#funcionarios">Publicadores</a></li>
  	</ul>

 
    <div class="tab-content">
      <div id="docentes" class="tab-pane fade in active">

        {{-- @include('alerts.request') --}}
          <!--{!!Form::open(['route'=>'usuario.store', 'method'=>'post','id'=>'formularioDocente','name'=>'formularioDocente'])!!}  
          -->
  
          <form action="{{ route('usuario.store') }}" method="post" id="formularioDocenteStore" class="formularioDocente" name="formularioDocente">
            <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>

            @include('usuario.forms.docente')

            <div class="modal-footer">
              <!-- {!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
              {!!Form::submit('Cancelar', ['class'=>'btn btn-default'])!!}
              -->           

                @if(!Auth::check())
                  <button type="button" class="cancelar btn btn-default" data-dismiss="modal">Cancelar</button>
                @endif
                <button  class="submit-registrar-docente btn btn-primary" title="Registrar este usuario">Registrar</button>
                 
            </div>
            <!--{!!Form::close()!!} -->
          </form>
      </div>
      <div id="funcionarios" class="tab-pane fade">
        {{-- @include('alerts.request') --}}
        <!--
       {!!Form::open(['route'=>'usuario.store', 'method'=>'post','id'=>'formularioFuncionario'])!!} 
       -->
       <form action="{{ route('usuario.store') }}" method="post" class="formularioFuncionario" name="formularioFuncionario">
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="toke"/>
          @include('usuario.forms.funcionario')

          <div class="modal-footer">
            <!--
            {!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
            {!!Form::submit('Cancelar', ['class'=>'btn btn-default'])!!}
            -->
                @if(!Auth::check())
                  <button type="button" class="cancelar btn btn-default" data-dismiss="modal">Cancelar</button>
                @endif
                <button class="submit-registrar-funcionario btn btn-primary" title="Registrar este usuario">Registrar</button>
            <!-- {!!Form::close()!!} -->
          </div>
        </form>
      </div>

    </div>
</div>
