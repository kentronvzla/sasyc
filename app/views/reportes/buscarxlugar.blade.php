 <div class="panel panel-danger">
    <div class="panel-heading" data-toggle="collapse" data-parent="#PanelFecha" href="#PanelFecha">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#PanelFecha" href="#PanelFecha">
                Por Ubicacion 
            </a>
        </h4>
    </div>
    <div id="PanelFecha" class="panel-collapse collapse">
        <div class="panel-body">
             <div class="row">
               {{Form::btInput($persona, 'parroquia->municipio->estado_id',6, 'text', ['data-url'=>'estados/municipios','data-child'=>'parroquia_municipio_id'])}}
               {{Form::btInput($persona, 'parroquia->municipio_id',6, 'text', ['data-url'=>'municipios/parroquias','data-child'=>'parroquia_id'])}}
            </div>
        </div>
    </div>
</div>
