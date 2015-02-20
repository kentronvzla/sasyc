<div class="modal-dialog" id="div-candidato-documentos">
    <div class="modal-content">
        {{Form::open(array('url'=>'solicitudes/devolverasignacion'))}}
        {{Form::hidden('id', $solicitud->id)}}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title">Confirmar Devolución de Aceptación de Solicitud</h4>
        </div>
        <div class="modal-body">
            @include('solicitudes.detalle_solicitud_modal')
            <h4>Presupuestos</h4>
            {{HTML::simpleTable($solicitud->presupuestos, 'Oracle\Presupuesto')}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Confirmar Devolución</button>
        </div>
        {{Form::close()}}
    </div>
</div>