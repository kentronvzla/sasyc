<div class="panel-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h4>Numero de Solicitud: {{$solicitud->id}}</h4> 
        </div>
    </div>
    {{Form::hidden('id',$solicitud->id)}}
    <div class="row">
        {{Form::btInput($solicitud,'descripcion')}}
    </div>
    <div class="row">
        {{Form::btInput($solicitud,'ind_inmediata',6)}}
        {{Form::btInput($solicitud,'referente_id',6)}}
    </div>
    <div class="row">
        {{Form::btInput($solicitud,'actividad')}}
    </div>
    <div class="row">
        {{Form::btInput($solicitud,'referencia')}}
    </div>
    <div class="row">
        {{Form::btInput($solicitud,'accion_tomada')}}
    </div>
    <div class="row">
        {{Form::btInput($solicitud,'recepcion_id',6)}}
        {{Form::btInput($solicitud,'organismo_id',6)}}
    </div>
    <div class="row">
        {{Form::btInput($solicitud,'tipo_ayuda_id',6)}}
        {{Form::btInput($solicitud,'area_id',6)}}
    </div>
    <div class="row">
        {{Form::btInput($solicitud,'necesidad')}}
    </div>
    <div class="row">
        {{Form::btInput($solicitud,'observaciones')}}
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                <button type="button" class="btn btn-default botonCancelar"><span class="glyphicon glyphicon-trash"></span> Cancelar</button>
            </div>
        </div>
    </div>
</div>
