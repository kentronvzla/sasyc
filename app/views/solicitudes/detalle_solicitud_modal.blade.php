<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-8">
        <h4>Número de Solicitud: <span id='span-solicitud-id'>{{$solicitud->id}}</span></h4>
    </div>
    <div class="col-md-4">
        <h5>Estatus: <b>{{$solicitud->estatus_display}}</b></h5>
    </div>
</div>
<div class="row">
    {{Form::display($solicitud,'descripcion',9, true)}}
</div>