<div class="modal-dialog" id="div-candidato-documentos">
    <div class="modal-content">
        {{Form::open(array('url'=>'solicitudes/modificar', 'class'=>'saveajax'))}}
        {{Form::hidden('id', $solicitud->id)}}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title">Enviar solicitud de aprobacion</h4>
        </div>


        <div class="modal-body">
            @if(@$inf_social == null)
                {{'No se puede aprobar la solicitud, hace falta Informe Socieconomico'}}
            @elseif (@$recaudos == null)
                {{'No se puede aprobar la solicitud, hace falta Recaudos Asociados'}}            
            @else
                {{'No se puede aprobar la solicitud porque le faltan Recaudos por Consignar'}}
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Reacudo</th>
                                <th>Recibido?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recaudos as $recaudo)
                            @if($recaudo->ind_recibido == true)
                            {{--*/ $ind_recaudo = "Si" /*--}}
                            @else
                            {{--*/ $ind_recaudo = "No" /*--}}
                            @endif
                            <tr>
                                @if($recaudo->recaudo->ind_obligatorio == true)
                                <td>{{$recaudo->recaudo->nombre}}</td>
                                <td>{{$ind_recaudo}}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
        {{Form::close()}}
    </div>
</div>

