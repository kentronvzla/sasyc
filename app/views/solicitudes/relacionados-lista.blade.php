<hr>
@if($familiares->count()>0)
<h4>Personas relacionadas al Solicitante (beneficiarios y/o familiares)</h4>
{{HTML::simpleTable($familiares, 'Persona', ['arrow-down'=>'Usar Persona'])}}
@else
<div class="row tituloLista">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h4>No posee personas relacionadas</h4>
    </div>
</div>
@endif