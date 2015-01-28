<div id="direccion_solicitante"> 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5">
            <h4> Usar dirección del beneficiario?</h4>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-1">
            <a class="btn btn-primary btn-xs glyphicon glyphicon-transfer" 
               title="Copiar dirección del beneficiario" data-id='{{$beneficiario->id}}' data-url='personas/copiar'>               
            </a>
        </div>
    </div>
    <div class="row">
        {{Form::btInput($beneficiario,'parroquia->municipio->estado_id',4, 'text', ['data-url'=>'estados/municipios','data-child'=>'municipio_id'])}}
        {{Form::btInput($beneficiario,'parroquia->municipio_id',4, 'text', ['data-url'=>'municipios/parroquias','data-child'=>'parroquia_id'])}}
        {{Form::btInput($beneficiario,'parroquia_id',4)}}
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
</div>
