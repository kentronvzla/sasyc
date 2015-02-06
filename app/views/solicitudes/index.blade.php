@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-danger">
        <div class="panel-heading"><h4 class="panel-title">Solicitudes</h4></div>
        <div class="panel-body">
            @foreach ($solicitudes as $solicitud)
            <div class="row filaLista warning">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <b>({{$solicitud->id}}) {{$solicitud->personaSolicitante->nombre_completo}}</b>
                    <br><a href="#" data-toggle="tooltip" data-original-title="{{$solicitud->personaSolicitante->informacion_contacto}}">(Información de contacto)</a>
                    @unless($solicitud->ind_mismo_benef)
                    <br>Beneficiario: {{$solicitud->personaBeneficiario->nombre_completo}}
                    <br><a href="#" data-toggle="tooltip" data-original-title="{{$solicitud->personaSolicitante->informacion_contacto}}">(Información de contacto)</a>
                    @endunless
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    {{$solicitud->descripcion}} / {{$solicitud->necesidad}}
                    <br>{{$solicitud->area->tipoAyuda->nombre or ""}} / {{$solicitud->area->nombre or ""}}
                    <br>{{$solicitud->recepcion->nombre or ""}} / {{$solicitud->organismo->nombre or ""}}
                    @if($solicitud->ind_inmediata)
                    {{$solicitud->actividad}} / {{$solicitud->referencia}}
                    @endif
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    Encargado: <b>{{$solicitud->usuarioAsignacion->nombre or "Sin Asignar"}}</b>
                    <br>¿Atención Inmediata?: <b>{{$solicitud->ind_inmediata ? "Si":"No"}}</b>
                    <br>Autorizado:<b>{{$solicitud->usuarioAutorizacion->nombre or "Sin Asignar"}}</b>
                    <br>Departamento: <b>{{$solicitud->departamento->nombre or "Sin Asignar"}}</b>
                    <br>Fecha Registro: <b>{{$solicitud->created_at->format('d/m/Y H:i')}}</b>
                    <br>Ultima Actualización: <b>{{$solicitud->updated_at->format('d/m/Y H:i')}}</b>
                    <br>Estatus: <b>{{$solicitud->estatus_display}}</b>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 text-right">
                    {{HTML::button('solicitudes/ver/'.$solicitud->id, 'search','Ver Solicitud')}}
                    {{HTML::button('solicitudes/modificar/'.$solicitud->id, 'pencil','Modificar Solicitud')}}
                    {{HTML::button('solicitudes/eliminar/'.$solicitud->id, 'trash','Eliminar Solicitud')}}
                </div>
            </div>
            @endforeach
            {{$solicitudes->appends(Input::all())->links('paginacion.slider-3')}}
        </div>
    </div>
</div>
</div>
@stop