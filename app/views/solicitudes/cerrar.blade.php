<div class="modal-dialog" id="div-candidato-documentos">
    <div class="modal-content">
        {{Form::open(array('url'=>'solicitudes/cerrar'))}}
        {{Form::hidden('id', $solicitud->id)}}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title">Cerrar Solicitud</h4>
        </div>
        <div class="modal-body">
            @include('solicitudes.detalle_solicitud_modal')
            <center><strong>Beneficiario</strong></center>
            <table border="0" style="width: 50%;">
                <tr>
                    <th style="width: 10%;"></th>
                    <th style="width: 40%;"></th>
                </tr>
                <tr>
                    <td style="background:white;"> 
                        <strong>Nombre: </strong>
                    </td>
                    <td style="background:white;">
                        {{$solicitud->personaBeneficiario->nombre}}
                    </td>
                </tr>
                <tr style="background:white;">
                    <td style="background:white;">
                        <strong>Apellido: </strong>
                    </td>
                    <td style="background:white;">
                        {{$solicitud->personaBeneficiario->apellido}}
                    </td>
                </tr>
                <tr style="background:white;">
                    <td><strong>Cedula: </strong></td>
                    <td>{{$solicitud->personaBeneficiario->ci}}</td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Cerrar</button>
        </div>
        {{Form::close()}}
    </div>
</div>