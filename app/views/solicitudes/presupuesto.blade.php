{{Form::open(['url'=>'presupuestos/modificar','id'=>'form-presupuesto','class'=>'saveajax'])}}
@if($presupuestos->count()>0)
{{HTML::simpleTable($presupuestos, 'Presupuesto',['pencil'=>'Editar', 'trash'=>'Eliminar'], 'presupuestos/presupuesto/'.$solicitud->id)}}
<h4>Presupuestos de la solicitud</h4>
@else
<div class="row tituloLista">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h4>No posee presupuestos asociados</h4>
    </div>
</div>
@endif
<hr>
{{Form::hidden('id',$presupuesto->id)}}
{{Form::hidden ('solicitud_id', $solicitud->id, ['id'=>'solicitud_id'])}}
<div class="row">
    {{Form::btInput($presupuesto,'requerimiento_id',8)}}
    {{Form::btInput($presupuesto,'cantidad',4)}}
</div>
<div class="row">
    {{Form::btInput($presupuesto,'beneficiario_id',5)}}
    <div class="col-md-3">
        <a id="btn-agregar-beneficiario" class="btn btn-danger">Agregar Beneficiario</a>
    </div>
    {{Form::btInput($presupuesto,'monto',4)}}
</div>
<div id="agregar-beneficiario" style="display:none;">
    {{Form::hidden('ind_creando_benef',0,['id'=>'ind_creando_benef'])}}
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h4>Agregar beneficiario a KERUX</h4> 
        </div>
    </div>
    <div class="row">
        {{Form::btInput($beneficiario_kerux,'nombre',8)}}
        {{Form::btInput($beneficiario_kerux,'appabrev',4)}}
    </div>
    <div class="row">
        {{Form::btInput($beneficiario_kerux,'letraid',2)}}
        {{Form::btInput($beneficiario_kerux,'numid',3)}}
        {{Form::btInput($beneficiario_kerux,'tipobenef',3,"select", [], Oracle\Beneficiario::$tipoBenef)}}
        {{Form::btInput($beneficiario_kerux,'clase',4, "select", [], Oracle\Beneficiario::$clase)}}
    </div>
    <div class="row">
        <div class="col-md-2">
            <a id="btn-seleccionar-beneficiario" class="btn btn-primary">Volver</a>
        </div>
    </div>
    <hr>
</div>
@include('templates.bootstrap.submit')
{{Form::close()}}