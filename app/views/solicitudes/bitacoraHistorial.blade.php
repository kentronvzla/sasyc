@include('solicitudes.detalle_solicitud_modal')
{{Form::open(['url'=>'bitacoras/modificar2','id'=>'form-bitacora','class'=>'saveajax'])}}
@if($bitacoras->count()>0)
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{$bitacora->getDescription('nota')}}</th>
                <th>{{$bitacora->getDescription('fecha')}}</th>                
            </tr>
        </thead>
        <tbody>
            @foreach($bitacoras as $bit)
            <tr>
                <td>{{$bit->getValueAt('nota')}}</td>
                <td>{{$bit->getValueAt('fecha')}}</td>               
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

@include('templates.bootstrap.submit')
{{Form::close()}}