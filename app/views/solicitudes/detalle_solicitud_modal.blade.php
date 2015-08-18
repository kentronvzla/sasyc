<div class="row">
    {{Form::display($solicitud,'num_solicitud',6)}}
    {{Form::display($solicitud,'estatus_display',6)}}
</div>
@unless(is_null($solicitud->tipo_proc) && is_null($solicitud->num_proc))
    <div class="row">
        {{Form::display($solicitud,'tipo_proc_for',6)}}
        {{Form::display($solicitud,'num_proc',6)}}
    </div>
@endunless