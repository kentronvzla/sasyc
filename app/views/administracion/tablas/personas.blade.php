@extends('administracion.principal')
@section('contenido2')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-danger">
    </div>
    <?php
    $ruta = \Route::getCurrentRoute();
    $url = url($ruta->getPath());
    ?>

    <div class="panel panel-danger">
        <div class="panel-heading"><h4 class="panel-title">Personas. <small>Mostrando registros del {{$personas->getFrom()}} al {{$personas->getTo()}} de un total de {{$personas->getTotal()}} registros</small></h4></div>
        <div class="panel-body" id='memos-lista'>
            @foreach ($personas as $persona)
      
            <div class="row filaLista marcar-m">
                {{Form::hidden('personas[]', $persona->id)}}

                <div class="col-xs-12 col-sm-4 col-md-4">

                    <br>Documento:<b>{{$persona->ci or 'Sin Informacion'}}</b>
                    <br>Nombre: <b>{{$persona->nombre}}</b>
                    <br>Apellido: <b>{{$persona->apellido}}</b>

                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">

                    <br>Sexo: <b>{{$persona->sexo}}</b>
                    <br>Estado Civil: <b>{{$persona->estado_civil->nombre}}</b>


                </div>
                <?php
                $ruta = \Route::getCurrentRoute();
                $url = url($ruta->getPath());
                ?>
                <div class="col-xs-12 col-sm-3 col-md-3 text-right">
                    <a class="btn btn-primary btn-xs" href="{{$url}}/modifica/{{$persona->id}}"><i class="fa fa-pencil"></i></a>
          
                </div>
            </div>
            @endforeach
            <h4><small>Mostrando registros del {{$personas->getFrom()}} al {{$personas->getTo()}} de un total de {{$personas->getTotal()}} registros</small></h4>
            {{$personas->appends(Input::all())->links()}}
            
        </div>
    </div>
</div>

@stop