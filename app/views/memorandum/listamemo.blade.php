@extends('layouts.master')
@section('contenido')

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="panel panel-danger">
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading"><h4 class="panel-title">Memorandus. <small>Mostrando registros del {{$memos->getFrom()}} al {{$memos->getTo()}} de un total de {{$memos->getTotal()}} registros</small></h4></div>
            <div class="panel-body" id='memos-lista'>
                @foreach ($memos as $memorandum)
                    <div class="row filaLista marcar-m">
                        {{Form::hidden('memos[]', $memorandum->id)}}
           
                        <div class="col-xs-12 col-sm-3 col-md-3">
          
                            <br>Numero: <b>{{$memorandum->numero}}</b>
                            <br>Fecha: <b>{{$memorandum->fecha}}</b>
                            <br>Asunto: <b>{{$memorandum->asunto or 'Sin Informacion'}}</b>
                            
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            
                            <br>Origen: <b>{{$memorandum->origen->nombre}}</b>
                            <br>Destino: <b>{{$memorandum->destino->nombre}}</b>
                            <br>Analista: <b>{{$memorandum->usuario->nombre}}</b>
                            
                        </div>
                      
                        <div class="col-xs-12 col-sm-4 col-md-4 text-right">
                            {{HTML::button('memorandum/ver/'.$memorandum->id, 'search','Ver Memorandum')}}
                            {{HTML::button('memorandum/imprimir/'.$memorandum->id, 'print','Imprimir Memorandum')}}
                        </div>
                    </div>
                @endforeach
                <h4><small>Mostrando registros del {{$memos->getFrom()}} al {{$memos->getTo()}} de un total de {{$memos->getTotal()}} registros</small></h4>
                {{$memos->appends(Input::all())->links()}}
            </div>
        </div>
    </div>
@stop
