@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$proceso, 'titulo'=>'Proceso'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/procesos'))}}
            {{Form::concurrencia($proceso)}}
            <div class="row">
                {{Form::hidden('id',$proceso->id)}}
                {{Form::btInput($proceso, 'nombre', 6)}}  
                
                <?php
                $documen= Defeventosasyc::select('tipo_doc')->get();
                   if ($documen->isEmpty()) {
                        $arreglo=null;
                         $documentos[$arreglo]='Sin informacion';
                   }
                foreach ($documen as $tipodoc) {
                $docu= $tipodoc['attributes'];
                $arreglo = array_shift($docu);
                $documentos[$arreglo]=$arreglo;
                }
                ?>
               
                {{Form::btInput($proceso, 'tipo_doc', 6,'select',[],$documentos)}}
                 
                {{Form::btInput($proceso, 'ind_cantidad', 6)}}
                {{Form::btInput($proceso, 'ind_monto', 6)}}
                {{Form::btInput($proceso, 'ind_beneficiario', 6)}}
              
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop