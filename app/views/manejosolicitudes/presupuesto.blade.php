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
    {{Form::btInput($presupuesto,'beneficiario_id',8)}}
    {{Form::btInput($presupuesto,'monto',4)}}
</div>
@include('templates.bootstrap.submit')
{{Form::close()}}