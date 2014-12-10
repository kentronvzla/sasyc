@extends('layouts.master')
@section('contenido')

<div class="panel panel-primary">
    <div class="panel-heading"><strong>Datos del Solicitante</strong> </div>
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
        <div class="col-xs-8 col-sm-12 col-md-2">
            <div class="form-group">
                <strong>Sexo:</strong>
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
         <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nombres">
            </div>
 </div>
         <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Apellidos">
            </div>
        </div>
                    
               <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Edad">
            </div>
        </div>
        <br>
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
         <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nivel de Instruccion">
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <strong> Trabaja:</strong>
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
         <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <select class="form-control" placeholder="Parentesco">
                    <option value="" >Parentesco</option>
                    <option value="" >Padre/Madre</option>
                    <option value="" >Hermano/a</option>
                    <option value="" >Tio/a</option>
                    <option value="" >Abuelo/a</option>
                    <option value="" >Primo/a</option>
                    <option value="" >Otro</option>
                </select> 
            </div>
        </div>

         
        </div> 
    </div> 

   <div class="panel panel-primary">
    <div class="panel-heading"> 
        <strong>Direccion de habitacion</strong> </div>
    <div class="panel-body">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Misma Direccion del Beneficiario:</strong>
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
                <input type="text" class="form-control" placeholder="Telefono Fijo">
            </div>
        </div> 
         <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Telefono Celular">
            </div>
        </div> 
         <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Otro Telefono">
            </div>
        </div>
   
        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Email">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Twitter">
            </div>
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Observaciones">
            </div>
        </div>  
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading"> <strong>Datos Empleo</strong> </div>
    <div class="panel-body">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Ocupacion">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Ingresos Mensuales">
            </div>
        </div>  
    </div>
</div>  
    @stop