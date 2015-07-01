{{Form::open(['url'=>'administracion/tablas/tipoEventos', 'id'=>'nuevoDocumento'])}}
<div id='div-documento'>
    <hr>
    <h4>Tipo de Documento</h4>
    
    
    <div class="row">
        {{Form::btInput($tipodocumento,'Tipo de Documento',5)}}
       
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary salvar-persona" style="display: none;"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
        </div>
    </div>
    <div id="lista-relacionados"></div>  
</div>
