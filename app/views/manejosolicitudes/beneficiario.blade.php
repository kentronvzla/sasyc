{{Form::hidden('solicitud_id',$solicitud->id)}}
{{Form::hidden('id',$beneficiario->id)}}
<div class="row">
    {{Form::btInput($beneficiario,'nombre',6)}}
    {{Form::btInput($beneficiario,'apellido',6)}}
</div>
<div class="row">
    {{Form::btInput($beneficiario,'tipo_nacionalidad_id',4)}}
    {{Form::btInput($beneficiario,'ci',4)}}
    {{Form::btInput($beneficiario,'sexo',4)}}
</div>
<div class="row">
    {{Form::btInput($beneficiario,'lugar_nacimiento',8)}}
    {{Form::btInput($beneficiario,'fecha_nacimiento',4)}}
</div>
<div class="row">
    {{Form::btInput($beneficiario,'edad',4)}}
    {{Form::btInput($beneficiario,'estado_civil_id',4)}}
    {{Form::btInput($beneficiario,'ind_asegurado',4)}}
</div>
<div class="row">
    {{Form::btInput($beneficiario,'nivel_academico_id',8)}}
    {{Form::btInput($beneficiario,'ind_trabaja',4)}}
</div>
<hr>
<h4>Datos Empleo</h4> 
<div class="row">
    {{Form::btInput($beneficiario,'ocupacion',6)}}
    {{Form::btInput($beneficiario,'ingreso_mensual',4)}}
    <div class="col-xs-12 col-sm-12 col-md-2">
        <div class="form-group">
            <a href="http://www.ivss.gov.ve/" class="btn btn-primary" target="_black"><i class="glyphicon glyphicon-search"></i> 
                IVSS
            </a>                
        </div>
    </div>         
</div>
<hr>
<h4>Datos de p&oacute;liza</h4> 
<div class="row">
    {{Form::btInput($beneficiario,'empresa_seguro',6)}}
    {{Form::btInput($beneficiario,'cobertura',6)}}
</div>
<div class="row">
    {{Form::btInput($beneficiario,'otro_apoyo')}}
</div>
<div class="row">     
    {{Form::btInput($beneficiario,'como_conocio_fps')}}
</div>
<hr>
<h4>Direcci&oacute;n de habitaci&oacute;n</h4> 
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
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
            <button type="button" class="btn btn-default botonCancelar"><span class="glyphicon glyphicon-trash"></span> Cancelar</button>
        </div>
    </div>
</div>
