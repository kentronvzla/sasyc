<div class="panel panel-danger">
    <div class="panel-heading" data-toggle="collapse" data-parent="#PanelSolicitante" href="#PanelSolicitante">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#PanelSolicitante" href="#PanelSolicitante">
                Por Solicitante
            </a>
        </h4>
    </div>
    <div id="PanelSolicitante" class="panel-collapse collapse">
        <div class="panel-body">
             <div class="row">
                {{Form::btInput($persona, 'nombre', 6)}}
                {{Form::btInput($persona, 'apellido', 6)}}
            </div>
        </div>
    </div>
</div>