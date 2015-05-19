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
            @include('solicitudes.detalle_solicitud_modal')
            <div class="row">
                {{Form::btInput($bitacora,'nota',12, 'textarea')}}
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
             @if(Usuario::puedeAcceder('GET.solicitudes.anular'))
            <button type="submit" class="btn btn-primary">Anular</button>
             @endif
        </div>
        {{Form::close()}}
    </div>
</div>