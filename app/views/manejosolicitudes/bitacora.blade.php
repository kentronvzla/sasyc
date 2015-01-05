@extends('layouts.master')
@section('contenido')
<div class="panel panel-primary">
    <div class="panel-heading"><strong>Bitacora</strong></div>  
    <div class="panel-body">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Numero de Solicitud:12575</strong> 
        </div> 
           <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <ul>
  <li>SASYC ADMIN registró el caso  sasyc - 17/12/2014 11:47:11</li>
</ul> 
       </div> 
       
        
        
        
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="">
            </div> 
        </div>  
        <div class="col-xs-12 col-sm-12 col-md-12">
        <p class="text-center">   
            <button type="button" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-default">Cancelar</button>

            <button type="button" class="btn btn-primary">Imprimir</button>
        </p>  
        </div>
        <div class="col-xs-12 col-sm-12 col-md-2">
            <div class="form-group">
                <strong> Alarma:</strong>
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


@stop