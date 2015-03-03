<div class="panel panel-danger">
    <div class="panel-heading" data-toggle="collapse" data-parent="#PanelBusqueda" href="#PanelBusqueda">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#PanelBusqueda" href="#PanelBusqueda">
                Búsqueda
            </a>
        </h4>
    </div>
    <div id="PanelBusqueda" class="panel-collapse collapse">
        <div class="panel-body">
            {{Form::busqueda(['url'=>'solicitudes','method'=>'GET'])}}
            <div class="row">
                <div class="col-md-6">
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

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#PanelBeneficiario" href="#PanelBeneficiario">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#PanelBusqueda" href="#PanelBeneficiario">
                                    Por Beneficiario
                                </a>
                            </h4>
                        </div>
                        <div id="PanelBeneficiario" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    {{Form::btInput($persona, 'nombre', 6)}}
                                    {{Form::btInput($persona, 'apellido', 6)}}
                                </div>
                                <div class="row">
                                    {{Form::btInput($persona, 'tipo_nacionalidad_id', 3)}}
                                    {{Form::btInput($persona, 'ci', 3)}}
                                    {{Form::btInput($persona, 'sexo', 6)}}
                                </div>
                                <div class="row">
                                    {{Form::btInput($persona, 'estado_civil_id', 6)}}
                                    {{Form::btInput($persona, 'lugar_nacimiento', 6)}}
                                </div>
                                <div class="row">
                                    {{Form::btInput($persona, 'fecha_nacimiento', 6)}}
                                    {{Form::btInput($persona, 'nivel_academico_id', 6)}}
                                </div>
                                <div class="row">
                                    {{Form::btInput($persona, 'parroquia->municipio->estado_id',6, 'text', ['data-url'=>'estados/municipios','data-child'=>'parroquia_municipio_id'])}}
                                    {{Form::btInput($persona, 'parroquia->municipio_id',6, 'text', ['data-url'=>'municipios/parroquias','data-child'=>'parroquia_id'])}}
                                </div>
                                <div class="row">
                                    {{Form::btInput($persona, 'parroquia_id',6)}}
                                    {{Form::btInput($persona, 'ciudad', 6)}}
                                </div>
                                <div class="row">
                                    {{Form::btInput($persona, 'zona_sector', 6)}}
                                    {{Form::btInput($persona, 'calle_avenida', 6)}}
                                </div>
                                <div class="row">
                                    {{Form::btInput($persona, 'apto_casa', 6)}}
                                    {{Form::btInput($persona, 'email', 6)}}
                                </div>
                                <div class="row">
                                    {{Form::btInput($persona, 'twitter', 6)}}
                                    {{Form::btInput($persona, 'ocupacion', 6)}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                    <a href="{{url('solicitudes')}}" class="btn btn-default btn-reset"><i class="glyphicon glyphicon-trash"></i> Cancelar</a>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>