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
            {{Form::display($solicitud->personaBeneficiario,'nombre',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'apellido',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'ci',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'sexo',3, true)}}
        </div>
        <div class="row">
            {{Form::display($solicitud->personaBeneficiario,'estadoCivil->nombre',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'fecha_nacimiento',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'edad',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'ind_trabaja',3, true)}}
        </div>
        <div class="row">
            {{Form::display($solicitud->personaBeneficiario,'ocupacion',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'nivelAcademico->nombre',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'ingreso_mensual',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'ind_asegurado',3, true)}}
        </div>
       
        <div class="row">
            @if ($solicitud->personaBeneficiario->ind_asegurado)
                {{Form::display($solicitud->personaBeneficiario,'empresa_seguro',3, true)}}
                {{Form::display($solicitud->personaBeneficiario,'cobertura',3, true)}}
            @endif
            {{Form::display($solicitud->personaBeneficiario,'otro_apoyo',3, true)}}
        </div>
        <h3>Direccion de habitación</h3>
        <div class="row">
            {{Form::display($solicitud->personaBeneficiario,'parroquia->municipio->estado->nombre',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'parroquia->municipio->nombre',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'parroquia->nombre',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'telefono_fijo',3, true)}}
        </div>
        <div class="row">
            {{Form::display($solicitud->personaBeneficiario,'zona_sector',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'calle_avenida',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'apto_casa',3, true)}}
            {{Form::display($solicitud->personaBeneficiario,'telefono_celular',3, true)}}
        </div>
        <hr width="100%">
        @if($solicitud->personaSolicitante->ci!=$beneficiario->ci)
            <h3>Datos personales de solicitante</h3>
            <div class="row">
                {{Form::display($solicitud->personaSolicitante,'nombre',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'apellido',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'ci',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'sexo',3, true)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->personaSolicitante,'estadoCivil->nombre',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'fecha_nacimiento',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'edad',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'ind_trabaja',3, true)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->personaSolicitante,'ocupacion',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'nivelAcademico->nombre',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'ingreso_mensual',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'ind_asegurado',3, true)}}
            </div>

            <div class="row">
                @if ($solicitud->personaBeneficiario->ind_asegurado)
                    {{Form::display($solicitud->personaSolicitante,'empresa_seguro',3, true)}}
                    {{Form::display($solicitud->personaSolicitante,'cobertura',3, true)}}
                @endif
                {{Form::display($solicitud->personaSolicitante,'otro_apoyo',3, true)}}
            </div>
            <h3>Direccion de habitación</h3>
            <div class="row">
                {{Form::display($solicitud->personaSolicitante,'parroquia->municipio->estado->nombre',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'parroquia->municipio->nombre',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'parroquia->nombre',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'telefono_fijo',3, true)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->personaSolicitante,'zona_sector',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'calle_avenida',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'apto_casa',3, true)}}
                {{Form::display($solicitud->personaSolicitante,'telefono_celular',3, true)}}
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
