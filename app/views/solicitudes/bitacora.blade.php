{{Form::open(['url'=>'bitacoras/modificar','id'=>'form-bitacora','class'=>'saveajax'])}}
@if($bitacoras->count()>0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>{{$bitacora->getDescription('nota')}}</th>
                <th>{{$bitacora->getDescription('ind_atendida')}}</th>
                <th>Atender</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bitacoras as $bit)
                <tr>
                    <td>{{$bit->getValueAt('nota')}}</td>
                    <td>{{$bit->getValueAt('ind_atendida')}}</td>
                    <td>
                        @if($bit->vencida)
                            <a class="btn btn-primary btn-xs fa fa-check edit-trigger" title="Atendida" data-id="{{$bit->id}}" data-url="bitacoras/atendida"></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="row tituloLista">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h4>No posee bitacoras asociados</h4>
        </div>
    </div>
@endif
<hr>
{{Form::hidden('id',$bitacora->id)}}
{{Form::hidden ('solicitud_id', $solicitud->id, ['id'=>'solicitud_id'])}}
<div class="row">
    {{Form::btInput($bitacora,'nota', 12)}}
</div>
<div class="row">
    {{Form::btInput($bitacora,'ind_alarma',6)}}
    <div id="div-fecha-bitacora" style="display:none;">
        {{Form::btInput($bitacora,'fecha',6)}}
    </div>
</div>
@include('templates.bootstrap.submit')
{{Form::close()}}