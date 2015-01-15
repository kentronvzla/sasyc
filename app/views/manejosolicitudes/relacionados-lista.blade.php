@if($familiares->count()>0)
{{HTML::simpleTable($familiares, 'Persona', ['arrow-down'=>'Usar Persona'])}}
@else
<div class="row tituloLista">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h4>No posee personas relacionadas</h4>
    </div>
</div>
@endif