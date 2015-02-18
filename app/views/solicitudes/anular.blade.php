<div class="modal-dialog" id="div-candidato-documentos">
    <div class="modal-content">
        {{Form::open(array('url'=>'solicitudes/anular'))}}
        {{Form::hidden('id', $solicitud->id)}}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title">Anular Solicitud</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8">
                    <h4>Número de Solicitud: <span id='span-solicitud-id'>{{$solicitud->id}}</span></h4> 
                </div>
                <div class="col-md-2">
                    <h5>Estatus: <b>{{$solicitud->estatus_display}}</b></h5>
                </div>
            </div>
            <div class="row">
                {{Form::btInput($bitacora,'nota',12, 'textarea')}}
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Anular</button>
        </div>
        {{Form::close()}}
    </div>
</div>