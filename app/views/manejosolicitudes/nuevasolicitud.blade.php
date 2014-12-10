@extends('layouts.master')
@section('contenido')
<div class="panel panel-danger">
    <div class="panel-heading"><strong>Nueva Solicitud</strong></div>  
    <div class="panel-body">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Solicitante es el mismo Beneficiario? </strong>
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
</div>
<div class="panel panel-danger">
    <div class="panel-heading"><strong>Datos del Solicitante</strong></div>
    <div class="panel-body">
        <br>
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
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <a href="http://www.cne.gob.ve/web/registro_electoral/ce.php?nacionalidad=V&cedula=11111111" class="btn btn-primary" target="_black"><i class="glyphicon glyphicon-search"></i> 
                    CNE    
                </a>
            </div> 
        </div> 
    </div>
</div>
<div class="panel panel-danger">
    <div class="panel-heading"><strong>Personas relacionadas al Solicitante (beneficiarios y/o familiares)</strong></div>
    <div class="panel-body">
        <table class="table">
            <tr>
                <th> Menor</th>
                <th> Cedula</th> 
                <th> Nombres</th> 
                <th> Apellidos</th>
            <tr>
                <td>
                    No   
                </td>
                <td>
                    18.934.893   
                </td>
                <td>
                    Antonio Jose
                </td>
                <td>
                    Ladera  Ortega
                </td>
            </tr>
        </table>
    </div>
</div>             
<div class="panel panel-danger">
    <div class="panel-heading"><strong>Datos del Beneficiario</strong></div>
    <div class="panel-body">
        <div class="col-xs-12 col-sm-12 col-md-2">
            <div class="form-group"> 
                <strong> Niño(a)</strong>  
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
        <div class="col-xs-12 col-sm-12 col-md-3">
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
        <div class="col-xs-12 col-sm-12 col-md-2">
            <div class="form-group">
                <a href="http://www.cne.gob.ve/web/registro_electoral/ce.php?nacionalidad=V&cedula=11111111" class="btn btn-primary" target="_black"><i class="glyphicon glyphicon-search"></i> 
                    CNE    
                </a>
            </div> 
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nombres">
            </div> 
            <br>   
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Apellidos">
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <a href="{{url('pantallas/solicitudesanteriores')}}" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i> 
            Siguiente
        </a>                
    </div>
</div>
@stop
