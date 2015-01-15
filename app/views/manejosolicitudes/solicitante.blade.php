{{Form::hidden('id',$solicitud->persona_solicitante_id)}}
{{Form::hidden('tipo','S')}}
<div class="row">
    {{Form::btInput($solicitante,'nombre',6)}}
    {{Form::btInput($solicitante,'apellido',6)}}
</div>
<div class="row">
    {{Form::btInput($solicitante,'tipo_nacionalidad_id',4)}}
    {{Form::btInput($solicitante,'ci',4)}}
    {{Form::btInput($solicitante,'sexo',4)}}
</div>
<div class="row">
    {{Form::btInput($solicitante,'lugar_nacimiento',8)}}
    {{Form::btInput($solicitante,'fecha_nacimiento',4)}}
</div>
<div class="row">
    {{Form::btInput($solicitante,'edad',4,'text',['disabled'=>'disabled'])}}
    {{Form::btInput($solicitante,'estado_civil_id',4)}}
    {{Form::btSelect('parentesco_id', Parentesco::getCombo("Parentesco"), 0, 4)}}
</div>
<div class="row">
    {{Form::btInput($solicitante,'nivel_academico_id',8)}}
    {{Form::btInput($solicitante,'ind_trabaja',4)}}
</div>
<hr>
<h4>Datos Empleo</h4> 
<div class="row">
    {{Form::btInput($solicitante,'ocupacion',6)}}
    {{Form::btInput($solicitante,'ingreso_mensual',4)}}

    <div class="col-xs-12 col-sm-12 col-md-2">
        <div class="form-group">
            <a href="http://www.ivss.gov.ve/" class="btn btn-primary" target="_black"><i class="glyphicon glyphicon-search"></i> 
                IVSS
            </a>                
        </div>
    </div>         
</div>
<hr>
<h4>Dirección de habitación</h4> 
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <h4> Usar dirección del beneficiario?</h4>
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
    {{Form::btInput($solicitante,'estado_id',4)}}
    {{Form::btInput($solicitante,'municipio_id',4)}}
    {{Form::btInput($solicitante,'parroquia_id',4)}}
</div>
<div class="row">
    {{Form::btInput($solicitante,'zona_sector',4)}}
    {{Form::btInput($solicitante,'calle_avenida',4)}}
    {{Form::btInput($solicitante,'apto_casa',4)}}
</div>
<div class="row">
    {{Form::btInput($solicitante,'telefono_fijo',4)}}
    {{Form::btInput($solicitante,'telefono_celular',4)}}
    {{Form::btInput($solicitante,'telefono_otro',4)}}
</div>
<div class="row">
    {{Form::btInput($solicitante,'email',6)}}
    {{Form::btInput($solicitante,'twitter',6)}}
</div>  
<div class="row">
    {{Form::btInput($solicitante,'observaciones')}}
</div>  
@include('templates.bootstrap.submit')