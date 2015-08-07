<div class="modal-dialog" id="div-candidato-documentos">
    <div class="modal-content">
        @foreach ($bitacoras as $bitacora)

        {{Form::open(array('url'=>'alertas', 'class'=>'saveajax'))}}
        {{Form::hidden('id', $bitacora->id)}}
        @endforeach
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title">Alertas</h4>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Notas</th>
                            <th>Atendia?</th>
                            <th>Atender</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bitacoras as $bit)
                        <tr>
                            <td>{{$bit->getValueAt('nota')}}</td>
                            <td>{{$bit->getValueAt('ind_atendida')}}</td>
                            <td>
                              
                                <a class="btn btn-primary btn-xs" target="_blank" href="{{$url}}/modificar/{{$bit->id}}/{{$bit->solicitud_id}}">
                                    <i class="fa fa-check"></i>
                                </a>
                               
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
        {{Form::close()}}
    </div>
</div>

