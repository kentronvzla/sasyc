@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$memo, 'titulo'=>'memos'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/memos'))}}
        <div class="row">
            {{Form::hidden('id',$memo->id)}}
            {{Form::btInput($memo, 'fecha', 6)}}
{{Form::btInput($memo, 'numero', 6)}}
{{Form::btInput($memo, 'origen', 6)}}
{{Form::btInput($memo, 'destino', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop