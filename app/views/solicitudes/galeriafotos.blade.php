{{Form::open(['url'=>'fotossolicitud/modificar','id'=>'form-galeria-fotos','class'=>'saveajax','files'=>true])}}
{{Form::hidden('id',$foto->id)}}
{{Form::hidden('solicitud_id',$solicitud->id)}}
<div class="row">
    <ul id='gallery'>
        @foreach($fotos as $ft)
        <li class="loaded">
            <a href="{{$ft->url}}">
                <img src="{{$ft->url}}" title="{{$ft->descripcion}}">
            </a>
            <div>
                <button type="button" class="btn btn-primary btn-xs glyphicon glyphicon-pencil" title="Editar" data-id="{{$ft->id}}" data-url="fotossolicitud/modificar"></button>
                <button type="button" class="btn btn-primary btn-xs glyphicon glyphicon-trash" title="Eliminar" data-id="{{$ft->id}}" data-url="fotossolicitud/foto"></button>
            </div>
        </li>
        @endforeach
    </ul>
</div>
<div class="row paddingFila">
    {{Form::btInput($foto,'descripcion',12)}}
</div>
<div class="row">
    {{Form::btInput($foto,'foto',6,'file')}}
    {{Form::btInput($foto,'ind_reporte',6)}}
</div>
@include('templates.bootstrap.submit')
{{Form::close()}}