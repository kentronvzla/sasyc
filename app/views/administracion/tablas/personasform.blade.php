@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            
            @include('templates.tituloBarra',array('obj'=>$persona, 'titulo'=>'personas'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/personas'))}}
            {{Form::concurrencia($persona)}}
            <div class="row">
                {{Form::hidden('id',$persona->id)}}
                {{Form::btInput($persona, 'nombre', 6)}}
                {{Form::btInput($persona, 'apellido', 6)}}
                {{Form::btInput($persona, 'tipo_nacionalidad_id', 3)}}
                {{Form::btInput($persona, 'ci', 3)}}
                {{Form::btInput($persona, 'sexo', 6)}}
                {{Form::btInput($persona, 'estado_civil_id', 6)}}
                {{Form::btInput($persona, 'lugar_nacimiento', 6)}}
                {{Form::btInput($persona, 'fecha_nacimiento', 6)}}
                {{Form::btInput($persona, 'nivel_academico_id', 6)}}
                {{Form::btInput($persona, 'parroquia->municipio->estado_id',6, 'text', ['data-url'=>'estados/municipios','data-child'=>'parroquia_municipio_id'])}}
                {{Form::btInput($persona, 'parroquia->municipio_id',6, 'text', ['data-url'=>'municipios/parroquias','data-child'=>'parroquia_id'])}}
                {{Form::btInput($persona, 'parroquia_id',6)}}
                {{Form::btInput($persona, 'ciudad', 6)}}
                {{Form::btInput($persona, 'zona_sector', 6)}}
                {{Form::btInput($persona, 'calle_avenida', 6)}}
                {{Form::btInput($persona, 'apto_casa', 6)}}
                {{Form::btInput($persona, 'telefono_fijo', 6)}}
                {{Form::btInput($persona, 'telefono_celular', 6)}}
                {{Form::btInput($persona, 'telefono_otro', 6)}}
                {{Form::btInput($persona, 'email', 6)}}
                {{Form::btInput($persona, 'twitter', 6)}}
                {{Form::btInput($persona, 'ind_trabaja', 6)}}
                {{Form::btInput($persona, 'ocupacion', 6)}}
                {{Form::btInput($persona, 'ingreso_mensual', 6)}}
                {{Form::btInput($persona, 'observaciones', 6)}}
                {{Form::btInput($persona, 'ind_asegurado', 6)}}
                {{Form::btInput($persona, 'seguro_id', 6)}}
                {{Form::btInput($persona, 'cobertura', 6)}}
                {{Form::btInput($persona, 'otro_apoyo', 6)}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop