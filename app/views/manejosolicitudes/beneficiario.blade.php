<div class="panel-body">
    <div class="row">
        {{Form::btInput($beneficiario,'nombre',6)}}
        {{Form::btInput($beneficiario,'apellido',6)}}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <select class="form-control"placeholder="Nacionalidad">
                <option value="" selected="selected">Nacionalidad</option>
                <option value="Venezolano">(V-)Venezolano</option>
                <option value="Extranjero">(E-)Extranjero</option>
            </select> 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="C.I">
        </div> 
    </div>
    <div class="col-xs-8 col-sm-12 col-md-2">
        <div class="form-group">
            <strong>Sexo:</strong>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2">
        <div class="form-group"> 
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary">
                    F
                </label>
                <label class="btn btn-default">
                    M
                </label>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8">
        <div class="form-group">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Lugar de Nacimiento">
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Fecha de Nacimiento">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Edad">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <select class="form-control"placeholder="Estado Civil">
                <option value="" selected="selected">Estado Civil</option>
                <option value=" Soltero">Soltero (a)</option>
                <option value="Casado">Casado (a)</option>
                <option value="Divorciado">Divorciado (a)</option>
                <option value="Viudo">Viudo (a)</option>
            </select> 
        </div>
    </div>    
    <div class="col-xs-12 col-sm-12 col-md-2">
        <div class="form-group">
            <strong>Posee Póliza:</strong>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2">
        <div class="form-group">            
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary">
                    Si
                </label>
                <label class="btn btn-default">
                    No
                </label>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nivel de Instrucci&oacute;n">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2">
        <div class="form-group">
            <strong> Trabaja:</strong>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2">
        <div class="form-group"> 
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary">
                    Si
                </label>
                <label class="btn btn-default">
                    No
                </label>
            </div>
        </div>
    </div>         
</div>
<div class="panel-heading"> 
    <strong>Datos Empleo</strong> 
</div>
<div class="panel-body">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Ocupaci&oacute;n">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Ingresos Mensuales">
        </div>
    </div>  
    <div class="col-xs-12 col-sm-12 col-md-2">
        <div class="form-group">
            <a href="http://www.ivss.gov.ve/" class="btn btn-primary" target="_black"><i class="glyphicon glyphicon-search"></i> 
                IVSS
            </a>                
        </div>
    </div>    
</div>
<div class="panel-heading"> 
    <strong>Datos de p&oacute;liza</strong> 
</div>
<div class="panel-body">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Empresa aseguradora">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Cobertura">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Otro apoyo otorgado">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Como Conocio FPS">
        </div>
    </div>
</div>
<div class="panel-heading"> 
    <strong>Direccion de habitacion</strong> 
</div>
<div class="panel-body">
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <select class="form-control"placeholder="Estado">
                <option value="" selected="selected">Estado</option>
            </select> 
        </div>
    </div>
    <div class="col-xs-12 col-sm-8 col-md-4">
        <div class="form-group">
            <select class="form-control"placeholder="Municipio">
                <option value="" selected="selected">Municipio</option>
            </select> 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <select class="form-control"placeholder="Parroquia">
                <option value="" selected="selected">Parroquia</option>
            </select> 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Zona o Sector">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Calle o Avenida">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Apto/Casa Nro.">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Tel&eacute;fono Fijo">
        </div>
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Tel&eacute;fono Celular">
        </div>
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Otro Tel&eacute;fono">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Email">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Twitter">
        </div>
    </div>  
</div>
