<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="cuerpo">
        <h3>Informe Social</h3>
        <div class="row">
            {{Form::display($solicitud,'descripcion',8, true)}}
            {{Form::display($solicitud,'estatus_display',4,true)}}
        </div>
        <div class="row">
            {{Form::display($solicitud,'referente->nombre',8, true)}}
            {{Form::display($solicitud->area,'tipoAyuda->nombre',4, true)}}
        </div>
        <div class="row">
            {{Form::display($solicitud,'necesidad',8, true)}}
            {{Form::display($solicitud,'area->nombre',4, true)}}
        </div>
        <div class="row">
            {{Form::display($solicitud,'observaciones',8, true)}}
            {{Form::display($solicitud,'ind_inmediata',4, true)}}
        </div>
        @if ($solicitud->ind_inmediata)
        <div class="row">
            {{Form::display($solicitud,'actividad',4,true)}}
            {{Form::display($solicitud,'referencia',4,true)}}
            {{Form::display($solicitud,'accion_tomada',4,true)}}
        </div>
        @endif
        <hr width="100%">
        <h3>Datos Personales Beneficiario</h3>
        <div class="row">
            {{Form::display($solicitud->getBeneficiario(),'nombre',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'apellido',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'ci',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'sexo',3, true)}}
        </div>
        <div class="row">
            {{Form::display($solicitud->getBeneficiario(),'estadoCivil->nombre',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'fecha_nacimiento',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'edad',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'ind_trabaja',3, true)}}
        </div>
        <div class="row">
            {{Form::display($solicitud->getBeneficiario(),'ocupacion',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'nivelAcademico->nombre',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'ingreso_mensual',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'ind_asegurado',3, true)}}
        </div>
       
        <div class="row">
            @if ($solicitud->getBeneficiario()->ind_asegurado)
                {{Form::display($solicitud->getBeneficiario(),'seguro_id',3, true)}}
                {{Form::display($solicitud->getBeneficiario(),'cobertura',3, true)}}
            @endif
            {{Form::display($solicitud->getBeneficiario(),'otro_apoyo',3, true)}}
        </div>
        <h3>Direccion de habitación</h3>
        <div class="row">
            {{Form::display($solicitud->getBeneficiario(),'parroquia->municipio->estado->nombre',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'parroquia->municipio->nombre',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'parroquia->nombre',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'telefono_fijo',3, true)}}
        </div>
        <div class="row">
            {{Form::display($solicitud->getBeneficiario(),'zona_sector',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'calle_avenida',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'apto_casa',3, true)}}
            {{Form::display($solicitud->getBeneficiario(),'telefono_celular',3, true)}}
        </div>
        <hr width="100%">
        @if(!$solicitud->ind_mismo_benef && $solicitud->getSolicitante()->ci!=$solicitud->getBeneficiario()->ci)
            <h3>Datos personales de Solicitante</h3>
            <div class="row">
                {{Form::display($solicitud->getSolicitante(),'nombre',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'apellido',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'ci',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'sexo',3, true)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->getSolicitante(),'estadoCivil->nombre',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'fecha_nacimiento',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'edad',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'ind_trabaja',3, true)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->getSolicitante(),'ocupacion',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'nivelAcademico->nombre',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'ingreso_mensual',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'ind_asegurado',3, true)}}
            </div>

            <div class="row">
                @if ($solicitud->getBeneficiario()->ind_asegurado)
                    {{Form::display($solicitud->getSolicitante(),'seguro_id',3, true)}}
                    {{Form::display($solicitud->getSolicitante(),'cobertura',3, true)}}
                @endif
                {{Form::display($solicitud->getSolicitante(),'otro_apoyo',3, true)}}
            </div>
            <h3>Direccion de habitación</h3>
            <div class="row">
                {{Form::display($solicitud->getSolicitante(),'parroquia->municipio->estado->nombre',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'parroquia->municipio->nombre',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'parroquia->nombre',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'telefono_fijo',3, true)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->getSolicitante(),'zona_sector',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'calle_avenida',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'apto_casa',3, true)}}
                {{Form::display($solicitud->getSolicitante(),'telefono_celular',3, true)}}
            </div>
        @endif
        <hr width="100%">
        @if($solicitud->presupuestos->count()>0)
            {{HTML::simpleTable($solicitud->presupuestos, 'Presupuesto')}}
        @else
            <p> <strong>No existe presupuesto asociado a esta solicitud</strong> </p>
        @endif
    </div>
</div>    
