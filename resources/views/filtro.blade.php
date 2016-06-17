<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Búsqueda</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">Busqueda rapida</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Tipos publicación</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
        <ul>
            <li>
                <input type="checkbox" id="revista" name="tipo" value="revista"><label for="revista">Revistas</label></input>
            </li>                   
            <li>
                <input type="checkbox" id="convocatoria" name="tipo" value="convocatoria"><label for="convocatoria">Convocatorias</label></input>
            </li>
            <li>
                <input type="checkbox" id="evento" name="tipo" value="evento"><label for="evento">Eventos</label></input>
            </li>
          </ul>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Áreas de publicación</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="barra-scroll panel-body">
        @if(isset($areas))
          <ul>
            @foreach($areas as $area)
              <li>
                  <input type="checkbox" id="area{{ $area->id }}" name="areas" value="{{ $area->id }}"><label for="area{{ $area->id }}">{{ $area->nombre }}</label></input>
              </li>
            @endforeach
          </ul>
        @endif
      </div>
    </div>
  </div>

   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        Ciudades</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="barra-scroll panel-body">
        @if(isset($lugares))
          <ul>
            @foreach($lugares as $lugar)
              <li>
                  <input type="checkbox" id="lugar{{ $lugar->id }}" name="lugares" value="{{ $lugar->id }}"><label for="lugar{{ $lugar->id }}">{{ $lugar->nombre }}</label></input>
              </li>
            @endforeach
          </ul>
        @endif
      </div>
    </div>
  </div>

   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
        Universidades/Entidades</a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse">
      <div class="barra-scroll panel-body">
        @if(isset($establecimientos))
          <ul>
            @foreach($establecimientos as $establecimiento)
              <li>
                  <input type="checkbox" id="establecimiento{{ $establecimiento->id }}" name="establecimientos" value="{{ $establecimiento->id }}"><label for="establecimiento{{ $establecimiento->id }}">{{ $establecimiento->nombre }}</label></input>
              </li>
            @endforeach
          </ul>
        @endif
      </div>
    </div>
  </div>
</div>