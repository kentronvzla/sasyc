<div class="modal-dialog modal-lg" id="div-candidato-documentos">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title">Bitacora de Solicitud</h4>
        </div>
        <div class="modal-body">
            @include('solicitudes.detalle_solicitud_modal')
            <div class="row">  
                <div class="col-xs-12 col-sm-12 col-md-12">
                    
                    {{HTML::simpleTable($solicitud->presupuestos, 'Presupuesto')}}
                    
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">CerraR</button>
        </div>
    </div>
</div>