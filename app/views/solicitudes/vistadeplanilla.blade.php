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
                {{Form::display($beneficiario,'nombre',3)}}
                {{Form::display($beneficiario,'apellido',3)}}
                {{Form::display($beneficiario,'ci',3)}}
                {{Form::display($beneficiario,'sexo',3)}}
            </div>
            <div class="row">
                {{Form::display($beneficiario,'estadoCivil->nombre',3)}}
                {{Form::display($beneficiario,'fecha_nacimiento',3)}}
                {{Form::display($beneficiario,'edad',3)}}
                {{Form::display($beneficiario,'ind_trabaja',3)}}
            </div>
            <div class="row">
                {{Form::display($beneficiario,'ocupacion',3)}}
                {{Form::display($beneficiario,'nivelAcademico->nombre',3)}}
                {{Form::display($beneficiario,'ingreso_mensual',3)}}
                {{Form::display($beneficiario,'ind_asegurado',3)}}
            </div>
            <div class="row">
                @if ($beneficiario->ind_asegurado)
                    {{Form::display($beneficiario,'empresa_seguro',3)}}
                    {{Form::display($beneficiario,'cobertura',3)}}
                @endif
                    {{Form::display($beneficiario,'otro_apoyo',3)}}
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
                {{Form::display($beneficiario,'parroquia->nombre',3)}}
                {{Form::display($beneficiario,'parroquia->municipio->nombre',3)}}
                <!---------------------detalle para indicae el nombre de un municipio-->
                {{Form::display($beneficiario,'parroquia->municipio->estado->nombre',3)}}
                {{Form::display($beneficiario,'telefono_fijo',3)}}
            </div>
            <div class="row">
                {{Form::display($beneficiario,'zona_sector',3)}}
                {{Form::display($beneficiario,'calle_avenida',3)}}
                {{Form::display($beneficiario,'apto_casa',3)}}
                {{Form::display($beneficiario,'telefono_celular',3)}}
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
        </td>
    </tr>
</table>