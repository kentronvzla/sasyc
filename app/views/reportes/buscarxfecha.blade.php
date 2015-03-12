 <div class="panel panel-danger">
    <div class="panel-heading" data-toggle="collapse" data-parent="#PanelFecha" href="#PanelFecha">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#PanelFecha" href="#PanelFecha">
                Por Fecha 
            </a>
        </h4>
    </div>
    <div id="PanelFecha" class="panel-collapse collapse">
        <div class="panel-body">
             <div class="row">
               {{Form::btInput($solicitud,'fecha_solicitud',3)}}
               {{Form::btInput($solicitud,'fecha_asignacion',3)}}
               {{Form::btInput($solicitud,'fecha_aprobacion',3)}}
               {{Form::btInput($solicitud,'fecha_cierre',3)}}
            </div>
        </div>
    </div>
</div>