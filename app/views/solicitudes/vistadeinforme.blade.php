<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="cuerpo">
        <h3>Situación fisico-ambiental</h3>
        <div class="row">
            {{Form::display($solicitud->tipoVivienda,'nombre',4)}}
            {{Form::display($solicitud->tenencia,'nombre',4)}}
            {{Form::display($solicitud,'total_ingresos',4)}}
        </div>
        <h3>Diagnostico Social</h3>
        <div class="row" style="text-align: justify;">
            {{$solicitud->informe_social}}
        </div>
    </div>
</div>