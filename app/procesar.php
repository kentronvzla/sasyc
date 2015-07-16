<?php

require_once('/ayudantes/webservices/nusoap.php');

/**
 * Procesa Documentos SASYC-KERUX.
 * @param integer $id_doc Identificador de documento
 * @param string $tipo_doc Tipo de Documento
 * @param string $desc_doc Descripcion del Documento
 * @param integer $id_doc_ref Identificador de referencia de documento
 * @param string $ref_doc Referencia del documento
 * @param integer $num_op Numero de 
 * @param string $tipo_evento Tipo de evento del Documento
 * @return integer $codigo = 1000 Procesos culminados satisfactoriamente
 * @return integer $codigo = 1001 No consigue configuración del documento en la definicion de eventos
 * @return integer $codigo = 1002 Error al modificar el campo cheque de la tabla presupuestos 
 * @return integer $codigo = 1003 Error al modificar el campo estatus de la tabla presupuestos cuando $tipo_evento = PRO
 * @return integer $codigo = 1004 Error al modificar el campo estatus de la tabla solicitudes
 * @return integer $codigo = 1005 Error al insertar nuevo registro de la tabla documentossasyc
 * @return integer $codigo = 1006 Error al modificar el campo estatus de la tabla presupuestos cuando $tipo_evento = DEV
 * @return integer $codigo = 1007 Error de conexión a la BD
 * @autor Reysmer Valle
 * @fecha 2015-07-10 
 */
function procesaDocumento($id_doc, $tipo_doc, $desc_doc, $id_doc_ref, $ref_doc, $num_op, $tipo_evento) {
    $parametros_json = file_get_contents('http://localhost/sasyc/public/parametros');
    $parametros = json_decode($parametros_json, true);
    if (count($parametros) > 0) {
        list($db, $host, $username, $password) = array($parametros['db_pgsql'], $parametros['host_pgsql'], $parametros['username_pgsql'], $parametros['password_pgsql']);
    } else {
        $db = $host = $username = $password = null;
    }
    list($T_EVENTO_GEN, $T_EVENTO_PRO, $EA_DOC, $ED_DOC, $fecha_actual, $VERSION) = array('GEN', 'PRO', 'APR', 'DEV', date("Y-m-d H:i:s"), 1); // $T_EVENTO = 'PRO';
    $dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";

    try {
        $dbh = new PDO($dsn);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($dbh) {
//            return htmlspecialchars("Se conectó a la base de datos ".$db." satisfactoriamente");
            $sql = "SELECT id, tipo_doc, tipo_evento, ind_aprueba_auto, ind_doc_ext, ind_ctas_adic, ind_reng_adic, ind_detcomp_adic FROM defeventosasyc WHERE tipo_doc ='" . $tipo_doc . "' AND tipo_evento = '" . $T_EVENTO_PRO . "';";
            $stmt = $dbh->query($sql);
            if ($stmt === false) {
                return 1001;
//                return htmlspecialchars("Error al ejecutar el query: $sql");
            } else {
                if ($stmt->rowCount() > 0) {
                    $defeventosasyc = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($tipo_evento == 'PRO') {
                        $sql = "UPDATE presupuestos SET cheque ='" . $ref_doc . "' WHERE documento_id ='" . $id_doc_ref . "';";
                        $stmt = $dbh->query($sql);
                        if ($stmt === false) {
                            return 1002;
                        } else {
                            if ($defeventosasyc['ind_aprueba_auto'] == true) {
                                $sql = "UPDATE presupuestos SET estatus_doc ='" . $EA_DOC . "' WHERE documento_id ='" . $id_doc_ref . "' RETURNING solicitud_id;";
                                $stmt = $dbh->query($sql);
                                if ($stmt === false) {
                                    return 1003;
                                } else {
                                    if ($stmt->rowCount() > 0) {
                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                        if (!actualizaEstatusSolicitud($dbh, $row['solicitud_id'])) {
                                            return 1004;
                                        }
                                        list($ind_aprueba_auto, $ind_doc_ext, $ind_ctas_adic, $ind_reng_adic, $ind_detcomp_adic) = array(($defeventosasyc['ind_aprueba_auto'] == true) ? 'true' : 'false', ($defeventosasyc['ind_doc_ext'] == true) ? 'true' : 'false', ($defeventosasyc['ind_ctas_adic'] == true) ? 'true' : 'false', ($defeventosasyc['ind_reng_adic'] == true) ? 'true' : 'false', ($defeventosasyc['ind_detcomp_adic'] == true) ? 'true' : 'false');
                                        $sql = "INSERT INTO documentossasyc (documento_id, tipo_doc, tipo_evento, descripcion, fecha, estatus, solicitud, ref_doc, num_op, mensaje, id_doc_ref, ind_aprueba_auto, ind_doc_ext, ind_ctas_adic, ind_reng_adic, ind_detcomp_adic, version, created_at, updated_at) ";
                                        $sql.= "VALUES (" . $id_doc_ref . ", '" . $tipo_doc . "', '" . $tipo_evento . "', '" . $desc_doc . "', '" . $fecha_actual . "', '" . $T_EVENTO_PRO . "', " . $row['solicitud_id'] . ", '" . $ref_doc . "', " . $num_op . ", NULL, " . $id_doc_ref . ", " . $ind_aprueba_auto . ", " . $ind_doc_ext . " , " . $ind_ctas_adic . " , " . $ind_reng_adic . " , " . $ind_detcomp_adic . " , " . $VERSION . ", '" . $fecha_actual . "', '" . $fecha_actual . "');";
                                        $stmt = $dbh->query($sql);
                                        if ($stmt === false) {
                                            return 1005;
                                        }
                                        return 1000;
                                    }
                                    return 1000;
                                }
                            }
                        }
                    } elseif ($tipo_evento == 'DEV') {
                        $sql = "UPDATE presupuestos SET estatus_doc ='" . $ED_DOC . "', cheque = NULL WHERE documento_id ='" . $id_doc_ref . "' RETURNING solicitud_id;";
                        $stmt = $dbh->query($sql);
                        if ($stmt === false) {
                            return 1006;
                        } else {
                            if ($stmt->rowCount() > 0) {
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                if (!actualizaEstatusSolicitud($dbh, $row['solicitud_id'])) {
                                    return 1004;
                                }
                                return 1000;
                            }
                            return 1000;
                        }
                    }
                } else {
                    return 1001;
                }
            }
        } else {
            return 1007;
        }
    } catch (Exception $e) {
        echo 'Excepción capturada: ', $e->getMessage(), "\n";
    } catch (PDOException $PDOe) {
        echo 'Excepción capturada: ', $PDOe->getMessage(), "\n";
    }
}

function actualizaEstatusSolicitud($dbh, $solicitud_id) {
    list($cont_aprobados, $cont_devueltos, $cont_procesados, $cont_total) = array(0, 0, 0, 0);
    $sql = "SELECT estatus_doc FROM presupuestos WHERE solicitud_id ='" . $solicitud_id . "';";
    $stmt = $dbh->query($sql);
    if ($stmt === false) {
        return false;
    } else {
        if ($stmt->rowCount() > 0) {
            $cont_total = $stmt->rowCount();
            $presupuestos_model = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($presupuestos_model as $presupuesto_model) {
                if ($presupuesto_model['estatus_doc'] == "APR") {
                    $cont_aprobados++;
                }
                if ($presupuesto_model['estatus_doc'] == "PPA") {
                    $cont_procesados++;
                }
                if ($presupuesto_model['estatus_doc'] == "DEV") {
                    $cont_devueltos++;
                }
            }
        }

        if ($cont_aprobados == $cont_total) {
            $estatus = "APR";
        } elseif ($cont_devueltos > 0) {
            $estatus = "DEV";
        } elseif ($cont_procesados > 0) {
            $estatus = "PPA";
        }
        $sql = "UPDATE solicitudes SET estatus ='" . $estatus . "' WHERE id ='" . $solicitud_id . "' RETURNING estatus;";
        $stmt = $dbh->query($sql);
        if ($stmt === false) {
            return false;
        } else {
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
    return false;
}

$server = new \soap_server();
$server->configureWSDL("procesar", "http://localhost/sasyc/app/");
$server->soap_defencoding = 'utf-8';
$server->xml_encoding = "utf-8";
$server->wsdl->schemaTargetNamespace = "http://localhost/sasyc/app/";

$server->register("procesaDocumento", array(
    "id_doc" => "xsd:integer",
    "tipo_doc" => "xsd:string",
    "desc_doc" => "xsd:string",
    "id_doc_ref" => "xsd:integer",
    "ref_doc" => "xsd:string",
    "num_op" => "xsd:integer",
    "tipo_evento" => "xsd:string",
        ), array("return" => "xsd:integer"), "http://localhost/sasyc/app/", "http://localhost/sasyc/app/procesar/procesaDocumento", "rpc", "encoded", "Procesa Eventos de Documentos");
$HTTP_RAW_POST_DATA = file_get_contents("php://input");
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : "";
$server->service($HTTP_RAW_POST_DATA);
