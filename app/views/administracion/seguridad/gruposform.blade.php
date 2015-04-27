<div class="modal-dialog modal-lg">
    {{Form::open(array('onSubmit'=>'return guardarAjax(this)','method'=>'POST','url'=>'administracion/seguridad/grupos'))}}
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar/Modificar</h4>
        </div>
        {{Form::concurrencia(@$grupo)}}
        {{Form::hidden('ID',@$grupo->id)}}
        <div class="modal-body">
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {{ Form::text('name',@$grupo->name, array('class' => 'form-control','placeholder'=>'Nombre del grupo.','required'=>'','data-tieneayuda'=>'0')) }}
                    </div>
                </div>
            </div>
            @if(is_object($grupo))
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="panel-group" id='div-permisos-sistema'>
                        @include('administracion.seguridad.tablapermisos',array('permisos'=>Grupo::$permisos,'asignados'=>false))
                    </div> 
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="panel-group" id='div-permisos-asignados'>
                        @include('administracion.seguridad.tablapermisos',array('permisos'=>$permisos,'asignados'=>true))
                    </div> 
                </div>
            </div>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
    {{Form::close()}}
</div>