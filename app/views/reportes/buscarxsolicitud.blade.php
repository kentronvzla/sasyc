<div class="panel panel-danger">
    <div class="panel-heading" data-toggle="collapse" data-parent="#PanelSolicitud" href="#PanelSolicitud">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#PanelSolicitud" href="#PanelSolicitud">
                Por Solicitud
            </a>
        </h4>
    </div>
    <div id="PanelSolicitud" class="panel-collapse collapse">
        <div class="panel-body">
             <div class="row">
                {{Form::btInput($solicitud,'observaciones',12)}}
            </div>
            <div class="row">
                {{Form::btInput($solicitud,'num_solicitud',6)}}
                {{Form::btInput($solicitud,'estatus',6)}}
            </div>
            <div class='row'>
                {{Form::btInput($solicitud,'area->tipo_ayuda_id',6, 'text', ['data-url'=>'tipoAyudas/areas','data-child'=>'area_id'])}}
                {{Form::btInput($solicitud,'area_id',6)}}
            </div>
        </div>
    </div>
</div>