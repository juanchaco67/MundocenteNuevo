@if(isset($publicacion))
	  <!-- Modal -->
  <div id="modalPublicacion" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="text-center modal-title">Registrate en Mundocente</h4>
        </div>

        

       <!-- <form role="form" action="registro" method="post"> -->
          <div class="modal-body">

          </div>

          <div class="modal-footer">
              <!-- {!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
              {!!Form::submit('Cancelar', ['class'=>'btn btn-default'])!!}
              -->           

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="Registrar" class="btn btn-primary">Registrar</button>
            </div>

            <!--<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            -->
        </div>
      <!-- </form> -->

    </div>
  </div>

  <a data-toggle="modal" data-target="#modalPublicacion" href="#">Registro</a>
@endif