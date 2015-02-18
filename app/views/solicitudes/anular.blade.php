<div class="modal-dialog" id="div-candidato-documentos">
    <div class="modal-content">
        {{Form::open(array('url'=>'solicitudes/anular'.$solictud->id))}}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Cerrar</span></button>
            <h4 class="modal-title" id="myModalLabel">
                <center>Anular Solicitud</center>
            </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                {{--Form::btInput($solicitud,'descripcion',12)--}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <!--solo para mostrar el modal, lo tengo que cambiar-->
                    <center>
                    <textarea name="descripcion" rows="5" cols="40">
                        
                    </textarea>
                    </center>
                </div>    
            </div>
            <br>
            <div class="row">
                <estorng>Estatus: </estorng>
                {{$solicitud->estatus}}
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Anular</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
        {{Form::close()}}
    </div>
</div>