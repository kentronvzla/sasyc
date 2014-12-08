@extends('layouts.master')
@section('contenido')
<div class="panel panel-primary">
    <div class="panel-heading"><strong>Datos de Solicitud</strong></div>  
  <div class="panel-body">

    Número de solicitud: Número auto generado que identifica la solicitud, no puede ser modificado por la pantalla.
    Descripción del caso: (TextArea)  que permite dar una pequeña explicación del motivo por el cual se solicita la ayuda.
    Referido por: (Combo) Que permite definir la persona que está refiriendo al solicitante, ya que de eso depende la prioridad.
    Acción inmediata: (Radio) Indica que esta actividad debe ser atendida de forma inmediata. Al seleccionar esta acción se activan los campos de Actividad, Referencia y Acción Tomada para que sean completados y usados en reportes posteriores.
    Actividad (Combo) Campo que permite registrar la información de la actividad de calle que se realizo, tabla que se alimenta con la data ingresada anteriormente.
    Referencia: (TextArea) Campo de referencia para la solicitud en particular.
    Acción tomada: (TextArea) Permite  indicar las acciones que se tomaron para ayudar al solicitante.
    Recepción (Anteriormente remitente  remitente): (Combo) El medio por el cual llego la solicitud a la fundación.
    Tipo de solicitud: (Combo) Tipos de ayuda que presta la fundación.
    Área (Anteriormente especialidad): (Combo) Representa el área específica en la cual se prestara la ayuda dependiendo del tipo de solicitud.
    Procesado por: (Combo) Lista de organismos que pueden procesar la solicitud y por los cuales se les define mediante configuración si son por articulación o se atenderá en la fundación.
    Necesidad: (Anteriormente Diagnostico) (TextArea) Campo donde se especifica la ayuda que el solicitante está pidiendo.
    Observaciones: (TextArea) Campo donde se exponen las posibles observaciones que pueda tener la solicitud.
@stop