<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AyudanteCurl
 *
 * @author Nadin Yamaui
 */
class CurlException extends Exception {

    public $codigoRespuesta;
    public $mensaje;

    function __construct(AyudanteCurl $curl) {
        $this->codigoRespuesta = $curl->codigoRespuesta;
        if ($this->codigoRespuesta == 400) {
            $this->mensaje = "El servidor devolvio el siguiente mensaje: " . (is_object($curl->respuestaObj) ? $curl->respuestaObj->mensaje : $curl->respuesta);
        } else {
            $this->mensaje = "Ocurrio un error interno... Esto es lo que sabemos." . $curl->respuesta." ".$curl->codigoRespuesta;
        }
    }

}
