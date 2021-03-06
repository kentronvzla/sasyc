{{Form::open(['url'=>'personas/crear/'.$beneficiario->id,'id'=>'form-familiares','class'=>'saveajax','data-callback'=>'grupoFamiliar'])}}
{{Form::hidden('id',$familiar->id,['id'=>'id'])}}
@if($familiares->count()>0)
{{HTML::simpleTable($familiares, 'Persona', ['pencil'=>'Editar', 'trash'=>'Eliminar'], 'personas/familiar/'.$beneficiario->id)}}
@else
<div class="row tituloLista">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h4>Aun no ha agregado un familiar</h4>
    </div>
</div>
@endif
<hr>
<div class="row">
    {{Form::btInput($familiar,'tipo_nacionalidad_id',3)}}
    {{Form::btInput($familiar,'ci',3)}}
    {{Form::btInput($familiar,'sexo',4,"select",[], BaseModel::$cmbsexo)}}
    <div class="col-xs-12 col-sm-12 col-md-2">
        <div class="form-group">
            <button type="button" class="btn btn-primary buscar-cne"><i class="glyphicon glyphicon-search"></i> CNE</button>
        </div> 
    </div>
</div>
<div class="row">
    {{Form::btInput($familiar,'nombre',6)}}
    {{Form::btInput($familiar,'apellido',6)}}
</div>
<div class="row">
    {{Form::btInput($familiar,'estado_civil_id',6)}}
    {{Form::btSelect('parentesco_id', Parentesco::getCombo("Parentesco"), @$parentesco->id, 6)}}
</div>
<div class="row">
    {{Form::btInput($familiar,'ocupacion',6)}}
    {{Form::btInput($familiar,'ingreso_mensual',6)}}
</div>  
@include('templates.bootstrap.submit')
{{Form::close()}}