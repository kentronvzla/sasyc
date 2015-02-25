{{Form::open(['url'=>'solicitudes/asignar', 'class'=>'saveajax','data-callback'=>'asignado'])}}
<div class="panel panel-danger">
    <div class="panel-heading"><h4 class="panel-title">Asignar solicitudes seleccionadas</h4></div>
    <div class="panel-body">
        <div id='solicitudes-marcadas'>

        </div>
        <div class="row">
            {{Form::hidden('campo', $campo)}}
            @if($campo=="departamento")
            {{Form::btInput($solicitud, 'departamento_id')}}
            @elseif($campo=="usuario")
            {{Form::btInput($solicitud, 'usuario_asignacion_id', 12, 'select',[],$analistas)}}
            @endif
        </div>
        @include('templates.bootstrap.submit', ['nomostrar'=>true, 'nombreSubmit'=>'Asignar'])
    </div>
</div>
{{Form::close()}}