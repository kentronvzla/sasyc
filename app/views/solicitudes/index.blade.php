@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-danger">
        <div class="panel-heading" data-toggle="collapse" data-parent="#PanelBusqueda" href="#PanelBusqueda">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#PanelBusqueda" href="#PanelBusqueda">
                    Búsqueda
                </a>
            </h4>
        </div>
        <div id="PanelBusqueda" class="panel-collapse collapse">
            <div class="panel-body">
                {{Form::busqueda(['url'=>'solicitudes','method'=>'GET'])}}
                @include('solicitudes.busqueda')
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                        <a href="{{url('solicitudes')}}" class="btn btn-default btn-reset"><i class="glyphicon glyphicon-trash"></i> Cancelar</a>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <div class="panel panel-danger">
        <div class="panel-heading"><h4 class="panel-title">Solicitudes</h4></div>
        <div class="panel-body" id='solicitudes-lista'>
            @foreach ($solicitudes as $solicitud)
            <div class="row filaLista marcar-solicitud">
                {{Form::hidden('solicitudes[]', $solicitud->id)}}
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <b>({{$solicitud->id}}) {{$solicitud->personaBeneficiario->nombre_completo}}</b>
                    <br><a href="#" data-toggle="tooltip" data-original-title="{{$solicitud->personaBeneficiario->informacion_contacto}}">(Información de contacto)</a>
                    @unless($solicitud->ind_mismo_benef)
                    <br>Solicitante: {{$solicitud->personaSolicitante->nombre_completo}}
                    <br><a href="#" data-toggle="tooltip" data-original-title="{{$solicitud->personaSolicitante->informacion_contacto}}">(Información de contacto)</a>
                    @endunless
                    <br>Cedula: <b>{{$solicitud->personaSolicitante->ci}}</b><br>
                    <br>Solicitud: <b>{{$solicitud->num_solicitud}}</b><br>
                    <br>Referido por: <b>{{$solicitud->referente->nombre}}</b><br>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    {{$solicitud->descripcion}} / {{$solicitud->necesidad}}
                    <br><b>{{$solicitud->area->tipoAyuda->nombre or ""}} / {{$solicitud->area->nombre or ""}}</b>
                    <br>{{$solicitud->recepcion->nombre or ""}} / {{$solicitud->organismo->nombre or ""}}
                    <br>¿Atención Inmediata?: <b>{{$solicitud->ind_inmediata ? "Si":"No"}}</b>
                    <br>Fecha Registro: <b>{{$solicitud->created_at->format('d/m/Y H:i')}}</b>                    
                    <br>Autorizado: <b>{{$solicitud->usuarioAutorizacion->nombre or "Sin Asignar"}}</b>
                    <br>Departamento: <b>{{$solicitud->departamento->nombre or "Sin Asignar"}}</b>
                    <br>Encargado: <b>{{$solicitud->usuarioAsignacion->nombre or "Sin Asignar"}}</b>                    
                    <br>
                    <br>Estatus: <b>{{$solicitud->estatus_display}}</b>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    @foreach($solicitud->presupuestos as $resultado)
                    <b>Requerimiento: {{$resultado->requerimiento->nombre or "Sin Asignar"}}</b>
                    @if($resultado->proceso->ind_beneficiario)
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;Beneficiario: <b>{{$resultado->beneficiario->nombre or "Sin Asignar"}}</b>
                    @endif
                     @if($resultado->proceso->ind_cantidad)
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;Cantidad: <b>{{$resultado->cantidad or "Sin Asignar"}}</b>
                    @endif
                    @if($resultado->proceso->ind_monto)
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;Monto: <b>{{$resultado->monto or "Sin Asignar"}}</b>
                    @endif
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;Estatus: <b>{{$resultado->documento->estatus or "Sin Generar"}}</b>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;IdDoc: <b>{{$resultado->documento_id or "Sin Generar"}}</b>
                    <br>
                    @endforeach
                </div>                        
                <div class="col-xs-12 col-sm-1 col-md-1 text-right">
                    {{HTML::button('solicitudes/ver/'.$solicitud->id, 'search','Ver Solicitud')}}
                    @if($solicitud->puedeModificar())
                    {{HTML::button('solicitudes/modificar/'.$solicitud->id, 'pencil','Modificar Solicitud')}}
                    @endif
                    @if(isset($anulando))
                    {{HTML::button('solicitudes/anular/'.$solicitud->id, 'trash','Anular Solicitud', true)}}
                    @endif
                    @if(isset($cerrar))
                    {{HTML::button('solicitudes/cerrar/'.$solicitud->id, 'lock','Cerrar Solicitud', true)}}
                    @endif
                    @if(isset($solo_asignadas) && $solicitud->puedeAceptarAsignacion())
                    {{HTML::button('solicitudes/aceptarasignacion/'.$solicitud->id, 'check','Aceptar Asignación', true)}}
                    @endif
                    @if(isset($solo_asignadas) && $solicitud->puedeDevolverAsignacion())
                    {{HTML::button('solicitudes/devolverasignacion/'.$solicitud->id, 'undo','Devolver Asignación', true)}}
                    @endif
                    @if(isset($solo_asignadas) && $solicitud->puedeSolicitarAprobacion())
                    {{HTML::button('solicitudes/solicitaraprobacion/'.$solicitud->id, 'certificate','Solicitar Aprobación', true)}}
                    @endif
                </div>
            </div>
            @endforeach
            {{$solicitudes->appends(Input::all())->links('paginacion.slider-3')}}
        </div>
    </div>
    @if(isset($campo))
    @include('solicitudes.asignar')
    @endif
</div>
@stop
@section('javascript')
{{HTML::script('js/views/solicitudes/index.js')}}
@stop