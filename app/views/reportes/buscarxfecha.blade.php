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
                {{Form::btInput($solicitud,'created_at_desde',6)}}
                {{Form::btInput($solicitud,'created_at_hasta',6)}}
            </div>
        </div>
    </div>
</div>