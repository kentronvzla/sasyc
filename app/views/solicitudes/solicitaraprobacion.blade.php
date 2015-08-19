<div class="modal-dialog modal-lg" id="div-candidato-documentos">
    <div class="modal-content">
        {{Form::open(array('url'=>'solicitudes/solicitaraprobacion', 'id'=>'form-solicitar-apr', 'class'=>'saveajax'))}}
        {{Form::hidden('id', $solicitud->id)}}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title">Enviar solicitud de aprobacion</h4>
        </div>
        <div class="modal-body">
            @include('solicitudes.detalle_solicitud_modal')
            {{Form::btInput($solicitud, 'usuario_autorizacion_id')}}
            @if($manual)
            <div class="row">
                {{Form::btInput($solicitud, 'num_proc')}}
            </div>
            @endif
            <h4>Presupuestos</h4>
            {{HTML::simpleTable($solicitud->presupuestos, 'Presupuesto')}}
            @if(empty($informe))
            <h4><span class="label label-danger">No se puede aprobar la solicitud, falta Informe Socieconomico</span></h4>
            @elseif(count($recaudos)<=0)
            <h4><span class="label label-danger">No se puede aprobar la solicitud, faltan recaudos por consignar</span></h4>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            @if(Usuario::puedeAcceder('GET.solicitudes.solicitaraprobacion') && !empty($informe) && count($recaudos)>0)
            <button type="submit" class="btn btn-primary">Solicitar Aprobación</button>
            @endif
        </div>
        {{Form::close()}}
    </div>
</div>