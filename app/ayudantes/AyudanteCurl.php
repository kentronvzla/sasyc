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

    public function enviarGet($url) {
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_NOBODY => false,
        );
        curl_setopt_array($ch, $optArray);
        $this->respuesta = substr(curl_exec($ch), curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        $this->codigoRespuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->respuestaObj = json_decode($this->respuesta);
        if ($this->codigoRespuesta != 200 && $this->codigoRespuesta != 204) {
            throw new CurlException($this);
        }
        curl_close($ch);
    }

    public function descargarArchivo($url, $destino) {
        $fd = fopen($destino, 'w+');
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_NOBODY => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FILE => $fd,
        );
        curl_setopt_array($ch, $optArray);
        curl_exec($ch);
        fclose($fd);
        curl_close($ch);
    }

    public static function getProyecto() {
        $curl = new AyudanteCurl();
        $curl->enviarGet(Configuracion::get('urlactualizacion') . 'proyecto?CLAVEPROYECTO=' . Configuracion::get('claveproyecto') . '&AMBIENTE=' . Configuracion::get('ambiente'));
        if ($curl->codigoRespuesta != 200) {
            throw new CurlException($curl);
        }
        return $curl;
    }

    public static function getUltimaVersion($ambiente = null) {
        if ($ambiente == null) {
            $ambiente = Configuracion::get('ambiente');
        }
        $curl = new AyudanteCurl();
        $curl->enviarGet(Configuracion::get('urlactualizacion') . 'ultimaversion?CLAVEPROYECTO=' . Configuracion::get('claveproyecto') . '&AMBIENTE=' . $ambiente);
        if ($curl->codigoRespuesta == 204) {
            return "No hay versiones..";
        }
        return $curl->respuestaObj->version;
    }

    public static function getVersion($id) {
        $curl = new AyudanteCurl();
        $curl->enviarGet(Configuracion::get('urlactualizacion') . 'version?CLAVEPROYECTO=' . Configuracion::get('claveproyecto') . '&AMBIENTE=' . Configuracion::get('ambiente') . '&IDVERSION=' . $id);
        return $curl;
    }

    public static function getVersiones() {
        $curl = new AyudanteCurl();
        $curl->enviarGet(Configuracion::get('urlactualizacion') . 'versiones?CLAVEPROYECTO=' . Configuracion::get('claveproyecto') . '&AMBIENTE=' . Configuracion::get('ambiente'));
        if ($curl->codigoRespuesta != 200) {
            throw new CurlException($curl);
        }
        return $curl;
    }

    public static function enviarVersion($idProyecto, $version, $comentario, $estable) {
        $curl = new AyudanteCurl();
        $url = Configuracion::get('urlactualizacion') . "version";
        $ch = curl_init();
        $archivo = new CURLFile(base_path('paquete.zip'));
        $data = array(
            'IDPROYECTO' => $idProyecto,
            'VERSION' => $version,
            'COMENTARIO' => $comentario,
            'RUTA' => $archivo,
            'ESTABLE' => $estable,
        );
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_NOBODY => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
        );
        curl_setopt_array($ch, $optArray);
        $curl->respuesta = substr(curl_exec($ch), curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        $curl->codigoRespuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl->respuestaObj = json_decode($curl->respuesta);
        if ($curl->codigoRespuesta == 400) {
            return false;
        } elseif ($curl->codigoRespuesta != 200) {
            throw new CurlException($curl);
        }
        curl_close($ch);
        return $curl->respuestaObj->mensaje;
    }

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
