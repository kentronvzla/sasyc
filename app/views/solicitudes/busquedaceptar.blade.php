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
                    <div class="row">
                        {{Form::btInput($solicitud,'num_solicitud',6)}}
                        {{Form::btInput($solicitud,'descripcion',6)}}
                    </div>
                    <div class="row">
                        {{Form::btInput($solicitud,'recepcion_id',6)}}
                        {{Form::btInput($solicitud,'organismo_id',6)}}
                    </div>
                    <div class="row">
                        {{Form::btInput($solicitud,'area->tipo_ayuda_id',6, 'text', ['data-url'=>'tipoAyudas/areas','data-child'=>'area_id'])}}
                        {{Form::btInput($solicitud,'area_id',6)}}
                    </div>
                    <div class="row">
                        @if (!isset($valor))
                        <?php $id=Sentry::getUser()->id;
                    ?>
                        {{Form::hidden('estatus','ACA')}}
                        {{Form::hidden('usuario_asignacion_id',$id)}}
                        @endif
                        {{Form::btInput($solicitud,'referente_id',6)}}
                    </div>
                    <div class="row">
                        {{Form::btInput($solicitud,'created_at_desde',6)}}
                        {{Form::btInput($solicitud,'created_at_hasta',6)}}
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#PanelPresupuesto" href="#PanelPresupuesto">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#PanelPresupuesto" href="#PanelPresupuesto">
                        Por Presupuesto
                    </a>
                </h4>
            </div>
            <div id="PanelPresupuesto" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">
                        {{Form::btInput($presupuesto,'requerimiento_id',6)}}
                        {{Form::btInput($presupuesto,'proceso_id',6)}}
                    </div>
                    <div class="row">
                        {{Form::btInput($presupuesto,'beneficiario_id',12)}}
                    </div>
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

