@extends('layouts.master')
@section('contenido')

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="panel panel-danger">
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading"><h4 class="panel-title">Documentos. <small>Mostrando registros del {{$documentossasyces->getFrom()}} al {{$documentossasyces->getTo()}} de un total de {{$documentossasyces->getTotal()}} registros</small></h4></div>
            <div class="panel-body" id='documentos-lista'>
                @foreach ($documentossasyces as $documentos)
                    <div class="row filaLista marcar-m">
                        {{Form::hidden('documentossasyces[]', $documentos->id)}}
           
                        <div class="col-xs-12 col-sm-3 col-md-3">
          
                            <br>Documento: <b>{{$documentos->documento_id}}</b>
                            <br>Tipo de Documento <b>{{$documentos->tipo_doc}}</b>
                            <br>Evento: <b>{{$documentos->tipo_evento}}</b>
                            <br>Descripcion: <b>{{$documentos->descripcion or 'Sin Informacion'}}</b>
                             <br>Fecha: <b>{{$documentos->fecha}}</b>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                           
                           
                            <br>Estatus: <b>{{$documentos->estatus}}</b>
                            <br>Solicitud: <b>{{$documentos->solictitud}}</b>
                            <br>Referencia: <b>{{$documentos->ref_doc}}</b>
                            <br>Numero de OP: <b>{{$documentos->num_op}}</b>
                            <br>Documento de Referencia: <b>{{$documentos->id_doc_ref}}</b>
                        </div>
                      
                        <div class="col-xs-12 col-sm-4 col-md-4 text-right">
                            {{HTML::button('documentos/ver/'.$documentos->id, 'search','Ver Documento')}}
                            {{HTML::button('documentos/imprimir/'.$documentos->id, 'print','Imprimir Documento')}}
                        </div>
                    </div>
                @endforeach
                <h4><small>Mostrando registros del {{$documentossasyces->getFrom()}} al {{$documentossasyces->getTo()}} de un total de {{$documentossasyces->getTotal()}} registros</small></h4>
                {{$documentossasyces->appends(Input::all())->links()}}
            </div>
        </div>
    </div>
@stop