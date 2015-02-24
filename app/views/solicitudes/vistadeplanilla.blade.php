<table class="table">
    <tr>
        <td class="danger">
            <strong>Datos de Solicitud</strong>
        </td>
    </tr>
    <tr>
        <td style="background-color: #fff">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    {{Form::display($solicitud,'descripcion',9, true)}}
                    {{Form::display($solicitud,'ind_inmediata',3)}}
                    {{Form::display($solicitud,'referente->nombre',9, true)}}
                    {{Form::display($solicitud,'area->nombre',3)}}
                    @if ($solicitud->ind_inmediata)
                        {{Form::display($solicitud,'actividad',5)}}
                        {{Form::display($solicitud,'referencia',4)}}
                        {{Form::display($solicitud,'accion_tomada',3)}}
                    @endif
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td class="danger">
            <strong>Datos de Beneficiario</strong>
        </td>
    </tr>
    <tr>
        <td style="background-color: #fff">
            <div class="row">
                {{Form::display($solicitud->personaBeneficiario,'nombre',3)}}
                {{Form::display($solicitud->personaBeneficiario,'apellido',3)}}
                {{Form::display($solicitud->personaBeneficiario,'ci',3)}}
                {{Form::display($solicitud->personaBeneficiario,'sexo',3)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->personaBeneficiario,'estadoCivil->nombre',3)}}
                {{Form::display($solicitud->personaBeneficiario,'fecha_nacimiento',3)}}
                {{Form::display($solicitud->personaBeneficiario,'edad',3)}}
                {{Form::display($solicitud->personaBeneficiario,'ind_trabaja',3)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->personaBeneficiario,'ocupacion',3)}}
                {{Form::display($solicitud->personaBeneficiario,'nivelAcademico->nombre',3)}}
                {{Form::display($solicitud->personaBeneficiario,'ingreso_mensual',3)}}
                {{Form::display($solicitud->personaBeneficiario,'ind_asegurado',3)}}
            </div>
            <div class="row">
                @if ($solicitud->personaBeneficiario->ind_asegurado)
                    {{Form::display($solicitud->personaBeneficiario,'empresa_seguro',3)}}
                    {{Form::display($solicitud->personaBeneficiario,'cobertura',3)}}
                @endif
                    {{Form::display($solicitud->personaBeneficiario,'otro_apoyo',3)}}
            </div>                        
        </td>
    </tr>
    <tr>
        <td class="danger">
            <strong>Datos de Direccion</strong>
        </td>
    </tr>
    <tr>
        <td style="background-color: #fff">
            <div class="row">
                {{Form::display($solicitud->personaBeneficiario,'parroquia->nombre',3)}}
                {{Form::display($solicitud->personaBeneficiario,'parroquia->municipio->nombre',3)}}
                <!---------------------detalle para indicae el nombre de un municipio-->
                {{--Form::display($solicitud->personaBeneficiario,'parroquia->municipio->estado->nombre',3)--}}
                {{Form::display($solicitud->personaBeneficiario,'telefono_fijo',3)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->personaBeneficiario,'zona_sector',3)}}
                {{Form::display($solicitud->personaBeneficiario,'calle_avenida',3)}}
                {{Form::display($solicitud->personaBeneficiario,'apto_casa',3)}}
                {{Form::display($solicitud->personaBeneficiario,'telefono_celular',3)}}
            </div>
        </td>
    </tr>
    <tr>
        <td class="danger">
            <strong>Datos de Presupuesto</strong>
        </td>
    </tr>
    <tr>
        <td style="background-color: #fff">
            {{--HTML::simpleTable($solicitud->presupuestos, 'Oracle\Presupuesto')--}}
            @include('solicitudes.tablapresupuesto')
        </td>
    </tr>
</table>