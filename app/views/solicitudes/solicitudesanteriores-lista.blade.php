<hr>
@if($solicitudes->count()>0)
<h4>Solicitudes Anteriores</h4>
{{HTML::simpleTable($solicitudes, 'Solicitud', [], "", ['pencil'=>'solicitudes/modificar'])}}
@else
<div class="row tituloLista">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h4>No posee solicitudes anteriores</h4>
    </div>
</div>
@endif