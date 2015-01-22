{{Form::hidden('id',$solicitud->id)}}
<div class="row">
    {{Form::btInput($solicitud,'tipo_vivienda_id',4)}}
    {{Form::btInput($solicitud,'tenencia_id',4)}}
    {{Form::btInput($solicitud,'total_ingresos',4)}}
</div>
<div class="row">
    {{Form::btInput($solicitud,'informe_social',12,'textarea',['class'=>'ckeditor '])}}
</div>
@include('templates.bootstrap.submit')
