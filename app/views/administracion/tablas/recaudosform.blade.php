@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$recaudo, 'titulo'=>'Recaudo'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/recaudos'))}}
            {{Form::concurrencia($recaudo)}}
            <div class="row">
                {{Form::hidden('id',$recaudo->id)}}
                {{Form::btInput($recaudo, 'nombre', 6)}}
                {{Form::btInput($recaudo, 'descripcion', 6)}}
                {{Form::btInput($recaudo, 'ind_obligatorio', 6)}}
                {{Form::btInput($recaudo, 'ind_vence', 6)}}
                {{Form::btInput($recaudo, 'ind_activo', 6)}}
                {{Form::btInput($recaudo, 'tipo_ayuda_id', 6)}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop