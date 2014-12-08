@extends('emails.master')
@section('contenido')
<p class="callout">
    Hola {{$nombre}},<br>
    Gracias por tu registro en .
    <br>
    El ultimo paso es activar tu cuenta, para ello haz click en 
    <a href="{{url('usuario/activar/'.$id.'/'.$codigoActivacion)}}">Activar mi cuenta</a>
</p>
@stop