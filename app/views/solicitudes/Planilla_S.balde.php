@section('contenido')
<div class="col-xs-12 col-sm-8 col-md-8">
    @include('solicitudes.PlanillaSolicitud',array('solicitud'=>$solicitud))
</div>
<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
    <div class="panel panel-default">
        <div class="btn-group">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-print"></span> Imprimir <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{url('solicitudes/imprimirsolicitud/'.@$solicitud->ID)}}"></a></li>
                <li><a href=""></a></li>
            </ul>
        </div>
        <div class="row editable" id="contenedorAyuda" data-id="">
        </div>
    </div>
</div>
@stop