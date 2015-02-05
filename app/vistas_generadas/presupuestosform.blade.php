@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$presupuesto, 'titulo'=>'presupuestos'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/presupuestos'))}}
        <div class="row">
            {{Form::hidden('id',$presupuesto->id)}}
            {{Form::btInput($presupuesto, 'solicitud_id', 6)}}
{{Form::btInput($presupuesto, 'requerimiento_id', 6)}}
{{Form::btInput($presupuesto, 'beneficiario_id', 6)}}
{{Form::btInput($presupuesto, 'cantidad', 6)}}
{{Form::btInput($presupuesto, 'monto', 6)}}
{{Form::btInput($presupuesto, 'estatus', 6)}}
{{Form::btInput($presupuesto, 'id_doc_proc', 6)}}
{{Form::btInput($presupuesto, 'id_sol_sum', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop