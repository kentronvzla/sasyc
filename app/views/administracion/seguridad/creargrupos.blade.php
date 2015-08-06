@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$grupo, 'titulo'=>'Grupo de Usuario'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/seguridad/grupos'))}}
            {{Form::concurrencia($grupo)}}
            <div class="row">
                {{Form::hidden('id',$grupo->id)}}
                {{Form::hidden('nombre', $grupo->name)}}   
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {{ Form::text('name',@$grupo->name, array('class' => 'form-control','placeholder'=>'Nombre del grupo.','required'=>'','data-tieneayuda'=>'0')) }}
                    </div>
                </div>
            </div>
           {{Form::submitBt()}}
            {{Form::close()}}
        </div>
          </div>
@stop 
        
        
 