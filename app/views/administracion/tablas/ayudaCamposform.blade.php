@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$ayudaCampo, 'titulo'=>'documentacion'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/ayudaCampos'))}}
            {{Form::concurrencia($ayudaCampo)}}
            <div class="row">
                {{Form::hidden('id',$ayudaCampo->id)}}
                {{Form::btInput($ayudaCampo, 'ayuda', 12, 'textarea',['class'=>'ckeditor '])}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop
@section('js')
    {{HTML::link('js/ckeditor/ckeditor.js')}}
@endsection