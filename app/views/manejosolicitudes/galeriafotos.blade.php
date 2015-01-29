{{Form::open(['url'=>'fotossolicitud/modificar','id'=>'form-galeria-fotos','class'=>'saveajax','files'=>true])}}
{{Form::hidden('id',$foto->id)}}
{{Form::hidden('solicitud_id',$solicitud->id)}}
<ul class="thumbnails gallery">
    @foreach($fotos as $foto)
    <li class="thumbnail">
        <a title="{{$foto->description}}" style="background:url({{$foto->url}})"
           href="{{$foto->url}}">
            <img alt="{{$foto->description}}" class="grayscale" src="{{$foto->url}}">
        </a>
    </li>
    @endforeach
</ul>
<div class="row">
    {{Form::btInput($foto,'descripcion',12)}}
</div>
<div class="row">
    {{Form::btInput($foto,'foto',6,'file')}}
    {{Form::btInput($foto,'ind_reporte',6)}}
</div>
@include('templates.bootstrap.submit')
{{Form::close()}}