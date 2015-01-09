<div class="panel-body">
    <div class="row">
        {{Form::btInput($solicitante,'nombre',6)}}
        {{Form::btInput($solicitante,'apellido',6)}}
    </div>
    <div class="row">
        {{Form::btInput($solicitante,'tipo_nacionalidad_id',4)}}
        {{Form::btInput($solicitante,'cedula',4)}}
        {{Form::btInput($solicitante,'sexo',4)}}
    </div>
    <div class="row">
        {{Form::btInput($solicitante,'lugar_nacimiento',8)}}
        {{Form::btInput($solicitante,'fecha_nacimiento',4)}}
    </div>
        <div class="row">
        {{Form::btInput($beneficiario,'edad',4)}}
        {{Form::btInput($beneficiario,'estado_civil_id',4)}}
        {{Form::btInput($beneficiario,'parentesco_id',4)}}
    </div>
    <div class="row">
        {{Form::btInput($beneficiario,'nivel_instruccion_id',8)}}
        {{Form::btInput($beneficiario,'ind_trabaja',4)}}
    </div>
</div> 

<div class="panel-heading"> 
    <strong>Datos Empleo</strong> 
</div>
<div class="panel-body">
        <div class="row">
        {{Form::btInput($beneficiario,'ocupacion_id',6)}}
        {{Form::btInput($beneficiario,'ingresos',4)}}

        <div class="col-xs-12 col-sm-12 col-md-2">
            <div class="form-group">
                <a href="http://www.ivss.gov.ve/" class="btn btn-primary" target="_black"><i class="glyphicon glyphicon-search"></i> 
                    IVSS
                </a>                
            </div>
        </div>         
    </div>
</div>

<div class="panel-heading"> 
    <strong>Dirección de habitación</strong> 
</div>
<div class="panel-body">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Usar dirección del beneficiario?</strong>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary">
                    Si
                </label>
                <label class="btn btn-default">
                    No
                </label>
            </div>
        </div>
    </div>    
    <div class="row">
        {{Form::btInput($beneficiario,'estado_id',4)}}
        {{Form::btInput($beneficiario,'municipio_id',4)}}
        {{Form::btInput($beneficiario,'parroquia_id',4)}}
    </div>
    <div class="row">
        {{Form::btInput($beneficiario,'zona_sector',4)}}
        {{Form::btInput($beneficiario,'calle_avenida',4)}}
        {{Form::btInput($beneficiario,'apto_casa',4)}}
    </div>
    <div class="row">
        {{Form::btInput($beneficiario,'telefono_fijo',4)}}
        {{Form::btInput($beneficiario,'telefono_celular',4)}}
        {{Form::btInput($beneficiario,'telefono_otro',4)}}
    </div>
    <div class="row">
        {{Form::btInput($beneficiario,'email',6)}}
        {{Form::btInput($beneficiario,'twitter',6)}}
    </div>  
    <div class="row">
        {{Form::btInput($beneficiario,'observaciones')}}
    </div>  
</div>