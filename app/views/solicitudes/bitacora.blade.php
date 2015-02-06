{{Form::open(['url'=>'bitacoras/modificar','id'=>'form-bitacora','class'=>'saveajax'])}}
@if($bitacoras->count()>0)
{{HTML::simpleTable($bitacoras, 'Bitacora')}}
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