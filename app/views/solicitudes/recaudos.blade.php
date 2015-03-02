{{Form::open(['url'=>'recaudossolicitud/modificar','id'=>'form-recaudos','class'=>'saveajax','files'=>true])}}

@if($recaudos->count()>0)
    <h4>Recaudos consignados</h4>
    {{HTML::simpleTable($recaudos, 'RecaudoSolicitud', ['pencil'=>'Recibido'],'recaudossolicitud/modificar')}}
@else
    <div class="row tituloLista">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h4>No posee recaudos relacionados</h4>
        </div>
    </div>
@endif
@if($recaudo->id!=0)
    {{Form::hidden('id', $recaudo->id)}}
    <hr>
    <div class="row">
        {{Form::display($recaudo,'recaudo->descripcion')}}
    </div>
    <div class="row">
        {{Form::btInput($recaudo,'fecha_vencimiento',6)}}
        {{Form::btInput($recaudo,'documento', 6,'file')}}
    </div>
    @include('templates.bootstrap.submit')
@endif
{{Form::close()}}