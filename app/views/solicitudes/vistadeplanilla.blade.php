<table class="table" border="0">
    <tr>
        <td class="danger">
            <strong>Informe social</strong>
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
            <strong>Datos personales del Beneficiario</strong>
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
                {{Form::display($beneficiario,'lugar_nacimiento',3)}}
                {{Form::display($beneficiario,'fecha_nacimiento',3)}}
                {{Form::display($beneficiario,'edad',3)}}
            </div>
            <div class="row">
                {{Form::display($beneficiario,'nivelAcademico->nombre',3)}}
                {{Form::display($beneficiario,'ind_trabaja',3)}}
                {{--Form::display($beneficiario,'ocupacion',3)--}}
                {{--Form::display($beneficiario,'ingreso_mensual',3)--}}
                {{Form::display($beneficiario,'ind_asegurado',3)}}
                {{Form::display($beneficiario,'empresa_seguro',3)}}
            </div>
            <div class="row">
                {{Form::display($beneficiario,'cobertura',3)}}
                {{Form::display($beneficiario,'otro_apoyo',3)}}
            </div>                              
        </td>
    </tr>
    <tr>
        <td  style="background: white;">
            <strong>Direccion de habitacion</strong>
        </td>
    </tr>
    <tr>
        <td style="background-color: #fff">
            <div class="row">
                {{Form::display($beneficiario,'parroquia->municipio->estado->nombre',3)}}
                {{Form::display($beneficiario,'parroquia->municipio->nombre',3)}}
                {{Form::display($beneficiario,'parroquia->nombre',3)}}
                {{Form::display($beneficiario,'zona_sector',3)}} 
            </div>
            <div class="row">
                telefono_otro
                {{Form::display($beneficiario,'calle_avenida',3)}}
                {{Form::display($beneficiario,'apto_casa',3)}}
                {{Form::display($beneficiario,'telefono_fijo',3)}}
                {{Form::display($beneficiario,'telefono_celular',3)}}
            </div>
            <div class="row">
                {{Form::display($beneficiario,'telefono_otro',3)}}
                {{Form::display($beneficiario,'email',3)}}
                {{Form::display($beneficiario,'twitter',3)}}
            </div>
        </td>
    </tr>
     @if($solicitud->personaSolicitante->ci!=$beneficiario->ci)
    <tr>
        <td class="danger">
            <strong>Datos personales del Solicitante</strong>
        </td>
    </tr>
    <tr>
        <td style="background-color: #fff">
            <div class="row">
                {{Form::display($solicitud->personaSolicitante,'nombre',3)}}
                {{Form::display($solicitud->personaSolicitante,'apellido',3)}}
                {{Form::display($solicitud->personaSolicitante,'ci',3)}}
                {{Form::display($solicitud->personaSolicitante,'sexo',3)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->personaSolicitante,'estadoCivil->nombre',3)}}
                {{Form::display($solicitud->personaSolicitante,'lugar_nacimiento',3)}}
                {{Form::display($solicitud->personaSolicitante,'fecha_nacimiento',3)}}
                {{Form::display($solicitud->personaSolicitante,'edad',3)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->personaSolicitante,'nivelAcademico->nombre',3)}}
                {{Form::display($solicitud->personaSolicitante,'ind_trabaja',3)}}
                {{--Form::display($solicitud->personaSolicitante,'ocupacion',3)--}}
                {{--Form::display($solicitud->personaSolicitante,'ingreso_mensual',3)--}}
                {{Form::display($solicitud->personaSolicitante,'ind_asegurado',3)}}
                {{Form::display($solicitud->personaSolicitante,'empresa_seguro',3)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->personaSolicitante,'cobertura',3)}}
                {{Form::display($solicitud->personaSolicitante,'otro_apoyo',3)}}
            </div>                        
        </td>
    </tr>
      <tr>
        <td  style="background: white;">
            <strong>Direccion de habitacion</strong>
        </td>
    </tr>
    <tr>
        <td style="background-color: #fff">
            <div class="row">
                {{Form::display($solicitud->personaSolicitante,'parroquia->municipio->estado->nombre',3)}}
                {{Form::display($solicitud->personaSolicitante,'parroquia->municipio->nombre',3)}}
                {{Form::display($solicitud->personaSolicitante,'parroquia->nombre',3)}}
                {{Form::display($solicitud->personaSolicitante,'zona_sector',3)}} 
            </div>
            <div class="row">
                telefono_otro
                {{Form::display($solicitud->personaSolicitante,'calle_avenida',3)}}
                {{Form::display($solicitud->personaSolicitante,'apto_casa',3)}}
                {{Form::display($solicitud->personaSolicitante,'telefono_fijo',3)}}
                {{Form::display($solicitud->personaSolicitante,'telefono_celular',3)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->personaSolicitante,'telefono_otro',3)}}
                {{Form::display($solicitud->personaSolicitante,'email',3)}}
                {{Form::display($solicitud->personaSolicitante,'twitter',3)}}
            </div>
        </td>
    </tr>
    @endif
    <tr>
        <td class="danger">
            <strong>Presupuesto</strong>
        </td>
    </tr>
    <tr>
        <td style="background-color: #fff">
            @if($solicitud->presupuestos->count()>0)
                @include('solicitudes.tablapresupuesto')
            @else
                <p> <strong>No existe presupuesto asociado a esta solicitud</strong> </p>
            @endif
        </td>
    </tr>
</table>