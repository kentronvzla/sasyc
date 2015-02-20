<?php

namespace Ayudantes\Packages;


class Sasyc {

    public static function aprobar($solicitud_id, $descripcion){
        $params = compact('solicitud_id', 'descripcion');
        $db = \DB::connection('oracle');
        $stmt = $db->getPdo()->prepare("BEGIN PROC_DOCUSASYC.SOLICITAR_APROBACION (:solicitud_id, :descripcion); END;");
        $stmt->execute($params);
    }
}