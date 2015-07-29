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
           
          <?php
          
          if ($inf_social== null) {
              echo ' No se puede aprobar la solicitud porque le falta el Informe Socieconomico';
              
         }else{ ?>
          
         
            No se puede aprobar la solicitud porque le faltan Recaudos por Consignar
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
                        @foreach($prueba as $bit)
                        <?php
                        if ($bit->ind_recibido == true) {
                            $reca = 'Si';
                        } else {

                            $reca = 'No';
                        }
                        ?>
                        <tr>
                            <td>{{$bit->recaudo->nombre}}</td>
                            <td>{{$reca}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        <?php } ?>
        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        </div>
        {{Form::close()}}
    </div>
</div>

