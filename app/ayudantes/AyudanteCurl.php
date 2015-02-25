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
class AyudanteCurl {

    public $respuesta;
    public $respuestaObj;
    public $codigoRespuesta;

    public static function enviarError(Exception $exception, $code) {
        $arr = explode('\\', get_class($exception));
        $stackFinal = $exception->getTraceAsString();
        $stackFinal .= "<br>Linea: " . $exception->getLine();
        $stackFinal .= "<br>Archivo: " . $exception->getFile();
        $stackFinal .= "<br>Mensaje: " . $exception->getMessage();
        $stackFinal .= "<br>Código: " . $code;
        $data = array(
            'EXCEPCION' => $arr[count($arr) - 1],
            'STACK' => $stackFinal,
            'URL' => Request::fullUrl() . ' (' . Request::method() . ')',
            'PARAMETROS' => json_encode(Input::all()),
        );
        $url = Configuracion::get('urlactualizacion') . 'error?CLAVEPROYECTO=' . Configuracion::get('claveproyecto') . '&AMBIENTE=' . Configuracion::get('ambiente') . '&VERSION=' . Configuracion::get('version');
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_NOBODY => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
        );
        curl_setopt_array($ch, $optArray);
        $curl = new AyudanteCurl();
        $curl->respuesta = substr(curl_exec($ch), curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        $curl->codigoRespuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl->respuestaObj = json_decode($curl->respuesta);
        if ($curl->codigoRespuesta != 200) {
            throw new CurlException($curl);
        }
        curl_close($ch);
        return $curl->respuestaObj->mensaje;
    }

}
