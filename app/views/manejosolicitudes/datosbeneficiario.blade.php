@extends('layouts.master')
@section('contenido')
<div class="panel panel-primary">
    <div class="panel-heading"><strong>Datos del Solicitante</strong> </div>
    <div class="panel-body">
    <br>
     <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Nacionalidad del Solicitante:</strong>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-danger">
                 (V-)Venezolana
                </label>
                <label class="btn btn-default">
                 (E-)Extranjera
                </label>
            </div>
        </div>
    </div>
   <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="input-group">
        <span class="input-group-addon">C.I Del Solicitante:</span>
        <input type="text" class="form-control" placeholder="C.I">
       </div> 
   </div>
 
        <div class="col-xs-8 col-sm-8 col-md-3">
        <div class="form-group">
            <strong>Sexo:</strong>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-danger">
                    Femenino
                </label>
                <label class="btn btn-default">
                 Masculino
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-group">
        <span class="input-group-addon">Nombres:</span>
        <input type="text" class="form-control" placeholder="Nombres">
        </div>
    </div>
    <br>
       <br>
     <div class=" col-md-6">
         <div class="input-group">
        <span class="input-group-addon">Apellidos:</span>
        <input type="text" class="form-control" placeholder="Apellidos">
        </div>
     </div>
        <br>
       <br>
       <br>
         <div class="col-xs-8 col-sm-8 col-md-6">  
        <div class="form-group"> 
            <strong> Estado Civil:</strong>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-danger">
                    Soltero (a)
                </label>
                <label class="btn btn-default">
                 Casado (a)
                </label>
                <label class="btn btn-default">
                  Divorciado (a)
                </label>
                <label class="btn btn-default">
                 Viudo (a)
                </label>
            </div>
        </div>
    </div>
      
    <div class="col-md-6">
         <div class="input-group">
        <span class="input-group-addon">Nacionalidad:</span>
        <input type="text" class="form-control" placeholder="Nacionalidad">
        </div>
        <br>
     </div>
       <div class="col-md-6">
        <div class="input-group">
            <div class="input-group">
        <span class="input-group-addon">Lugar de Nacimiento</span>
        <input type="text" class="form-control" placeholder="Lugar de Nacimiento">
        </div>
        </div>
</div>
   
    <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Fecha de Nacimiento</span>
        <input type="text" class="form-control" placeholder="dd/mm/aa">
        </div>
    </div>
    <br>
    <br>
    <div class="col-md-2">
        <div class="input-group">
        <span class="input-group-addon">Edad:</span>
        <input type="text" class="form-control" placeholder="Edad">
        </div>
    </div>
  <br>
  <br>
  <br>
     <br>
  <div class="col-md-6">
        <div class="input-group">
        <span class="input-group-addon">Nivel de Instruccion:</span>
        <input type="text" class="form-control" placeholder="Nivel de Instruccion">
        </div>
    </div>
  
      <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong> Trabaja:</strong>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-danger">
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
            <strong> Posee Poliza:</strong>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-danger">
                    Si
                </label>
                <label class="btn btn-default">
                 No
                </label>
            </div>
        </div>
    </div>
  <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Empresa Aseguradora:</span>
        <input type="text" class="form-control" placeholder="Empresa aseguradora">
        </div>
    </div>
  <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Cobertura</span>
        <input type="text" class="form-control" placeholder="Cobertura">
        </div>
    </div>
  <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Otro apoyo otorgado:</span>
        <input type="text" class="form-control" placeholder="Otro apoyo otorgado">
        </div>
    </div>
      <br>
       <br>
        <br>
       <br>
        <br>
      
  <div class="col-md-12">
        <div class="input-group">
        <span class="input-group-addon">Como Conocio FPS:</span>
        <input type="text" class="form-control" placeholder="Como Conocio FPS">
        </div>
    </div>
   </div>
    </div>


<div class="panel panel-primary">
    <div class="panel-heading"> <strong>Direccion de habitacion</strong> </div>
    <div class="panel-body">
<div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Estado</span>
        <input type="text" class="form-control" placeholder="Edo.">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Municipio</span>
        <input type="text" class="form-control" placeholder="Municipio">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Parroquia</span>
        <input type="text" class="form-control" placeholder="Parroquia">
        </div>
    </div>
          <br>
       <br>
        <br>
    <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Zona o Sector</span>
        <input type="text" class="form-control" placeholder="Cobertura">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Calle o Avenida</span>
        <input type="text" class="form-control" placeholder="Calle o Avenida">
        </div>
    </div>
 
    <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Apto/Casa Nro.</span>
        <input type="text" class="form-control" placeholder="Apto/Casa Nro.">
        </div>
    </div>
          <br>
       <br>
        <br>
        <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Telefono Fijo</span>
        <input type="text" class="form-control" placeholder="0212-5555555">
        </div>
       </div> 
            <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Telefono Celular</span>
        <input type="text" class="form-control" placeholder="0416-5555555">
        </div>
       </div> 
        <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Otro Telefono</span>
        <input type="text" class="form-control" placeholder="0412-5555555">
        </div>
      </div>
          <br>
       <br>
        <br>
        <div class="col-md-6">
        <div class="input-group">
        <span class="input-group-addon">Email</span>
        <input type="text" class="form-control" placeholder="yyy@yyyyy.com">
        </div>
       </div>
        <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Twitter</span>
        <input type="text" class="form-control" placeholder="@yyy">
        </div>
       </div>  
  </div>
     </div>

    <div class="panel panel-primary">
    <div class="panel-heading"> <strong>Datos Empleo</strong> </div>
    <div class="panel-body">
    <div class="col-md-6">
        <div class="input-group">
        <span class="input-group-addon">Ocupacion</span>
        <input type="text" class="form-control" placeholder="Ocupacion">
        </div>
       </div>
        <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon">Ingresos Mensuales</span>
        <input type="text" class="form-control" placeholder="Ingresos Mensuales">
        </div>
       </div>  
 </div>
       </div>  
    @stop