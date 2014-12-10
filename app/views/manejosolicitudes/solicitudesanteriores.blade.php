@extends('layouts.master')
@section('contenido')

<div class="panel-heading">
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Solicitudes Anteriores</strong> 
        </div>
        <div class="panel-body">
            <p>Informacion de solicitudes anteriores asociadas al solicitante o beneficiario</p>
        </div>

        <table class="table">
            <tr>
                <th> Tramito como</th>
                <th>Nro. de Solicitud</th>
                <th>Fecha de Solicitud</th>
                <th>Cedula Beneficiario</th>
                <th>Cedula Solicitante</th>
                <th>Nombre del solicitante</th>
                <th> Trabajador(a) Social</th>
                <th>Estatus</th>
            </tr>
            <tr>
                <td>
                    Solicitante   
                </td>
                <td>
                    2255688  
                </td>
                <td>
                    21/11/2014    
                </td> 
                <td>
                    20.557.691     
                </td>
                <td>
                    15.982.349  
                </td>
                <td>
                    Ana Navarro  
                </td>
                <td>
                    Alberto Nadera  
                </td>
                <td>
                    En Proceso 
                </td>

            </tr>
        </table>
    </div>

    @stop