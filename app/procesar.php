<?php

//namespace app;
//header("Content-Type:text/xml");
//ini_set('display_errors','Off');
//ini_set("soap.wsdl_cache_enabled", "0"); 
require_once('/ayudantes/webservices/nusoap.php');

function procesaDocumento($id_doc, $tipo_doc, $desc_doc, $id_doc_ref, $ref_doc, $num_op, $tipo_evento) {

    list($db, $host, $username, $password, $db1, $host1, $username1, $password1, $charset1) = array('sasyc_desarrollo', 'appwebdesa.kentron.com.ve', 'sasyc', 'sasyc', 'keruxalt', 'olimpo', 'sasyc', 'sasyc', 'AL32UTF8');
    list($T_EVENTO_GEN, $T_EVENTO_PRO, $EA_DOC, $ED_DOC, $fecha_actual, $VERSION) = array('GEN', 'PRO', 'APR', 'DEV', date("Y-m-d H:i:s"), 1); // $T_EVENTO = 'PRO';
    $tns = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $host1)(PORT = 1521)))(CONNECT_DATA = (SERVICE_NAME = orcl)))";
    $dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";
    $dsn1 = "oci:host=$host1;port=1521;dbname=$db1;charset=$charset1;user=$username1;password=$password1";

    try {
        $dbh = new PDO($dsn);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($dbh) {
//            echo "Se conectó a la base de datos ".$db." satisfactoriamente";
            $sql = "SELECT id, tipo_doc, tipo_evento, ind_aprueba_auto, ind_doc_ext, ind_ctas_adic, ind_reng_adic, ind_detcomp_adic FROM defeventosasyc WHERE tipo_doc ='" . $tipo_doc . "' AND tipo_evento = '" . $T_EVENTO_GEN . "';";
            $stmt = $dbh->query($sql);
            if ($stmt === false) {
                return 1001;
//                return htmlspecialchars("Error al ejecutar el query: $sql");
//                die("Error al ejecutar el query: $sql");
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
                                        if(!actualizaEstatusSolicitud($dbh, $row['solicitud_id'])){
                                            return 1004;
                                        }    
                                        list($ind_aprueba_auto, $ind_doc_ext, $ind_ctas_adic, $ind_reng_adic, $ind_detcomp_adic) = array(($defeventosasyc['ind_aprueba_auto'] == true) ? 'true' : 'false', ($defeventosasyc['ind_doc_ext'] == true) ? 'true' : 'false', ($defeventosasyc['ind_ctas_adic'] == true) ? 'true' : 'false', ($defeventosasyc['ind_reng_adic'] == true) ? 'true' : 'false', ($defeventosasyc['ind_detcomp_adic'] == true) ? 'true' : 'false');
                                        $sql = "INSERT INTO documentossasyc (documento_id, tipo_doc, tipo_evento, descripcion, fecha, estatus, solicitud, ref_doc, num_op, mensaje, id_doc_ref, ind_aprueba_auto, ind_doc_ext, ind_ctas_adic, ind_reng_adic, ind_detcomp_adic, version, created_at, updated_at) ";
                                        $sql.= "VALUES (" . $id_doc_ref . ", '" . $tipo_doc . "', '" . $tipo_evento . "', '" . $desc_doc . "', '" . $fecha_actual . "', '" . $T_EVENTO_PRO . "', " . $row['solicitud_id'] . ", '" . $ref_doc . "', " . $num_op . ", NULL, " . $id_doc_ref . ", " . $ind_aprueba_auto . ", " . $ind_doc_ext . " , " . $ind_ctas_adic . " , " . $ind_reng_adic . " , " . $ind_detcomp_adic . " , " . $VERSION . ", '" . $fecha_actual . "', '" . $fecha_actual . "');";
                                        $stmt = $dbh->query($sql);
                                        if ($stmt === false) {
                                            return 1005;
                                        }
                                        return 1000;    //CODIGO DE MENSAJE SI REALIZA TODOS LOS PROCESOS
//                                    else{
//                                        if ($stmt->rowCount() > 0) {                                         
//                                            $pkg = llamarPackage($dsn1, $id_doc_ref);
//                                            return $pkg;
//                                        }
//                                    }
                                    }
                                    return 1000;    //CODIGO DE MENSAJE SI REALIZA TODOS LOS PROCESOS
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
                                if(!actualizaEstatusSolicitud($dbh, $row['solicitud_id'])){
                                    return 1004;
                                }    
                                return 1000;    //CODIGO DE MENSAJE SI REALIZA TODOS LOS PROCESOS
                            }
                            return 1000;        //CODIGO DE MENSAJE SI REALIZA TODOS LOS PROCESOS
                        }
                    }
                } else {
                    return 1001;            //CODIGO DE ERROR SI NO CONSIGUE LA CONFIGURACIÓN DEL DOCUMENTO
                }
//                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
//                    return array(
//                        'id' => $row['id'],
//                        'nombre' => $row['nombre'],
//                        'descripcion' => $row['descripcion'],
//                        'cod_cta' => $row['cod_cta']
//                    );
//                endwhile;
            }
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

function llamarPackage($dsn1, $id_doc_ref) {
    try {
        $dbh1 = new PDO($dsn1);
        if ($dbh1) {
            $param0;
            list($param1, $param2) = array($id_doc_ref, 'SASC');
            $stmt = $dbh1->prepare("BEGIN :param0 := PROC_MENSAJERO.APRUEBA_DOC(:param1, :param2); END;");
            $stmt->bindParam(':param0', $param0, PDO::PARAM_STR, 255);
            $stmt->bindParam(':param1', $param1, PDO::PARAM_INT);
            $stmt->bindParam(':param2', $param2, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }
    } catch (Exception $e) {
        return 'Excepción capturada: ' . $e->getMessage() . "\n";
    } catch (PDOException $PDOe) {
        return 'Excepción capturada: ' . $PDOe->getMessage() . "\n";
    }
    return false;
}

$server = new \soap_server();
$server->configureWSDL("procesar", "http://localhost/sasyc/app/");
$server->soap_defencoding = 'utf-8';
$server->xml_encoding = "utf-8";
$server->wsdl->schemaTargetNamespace = "http://localhost/sasyc/app/";
//$server->wsdl->addComplexType('detalle', 'complexType', 'struct', 'all', '', array(
//    'id' => array('name' => 'id', 'type' => 'xsd:int'),
//    'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
//    'descripcion' => array('name' => 'descripcion', 'type' => 'xsd:string'),
//    'cod_cta' => array('name' => 'cod_cta', 'type' => 'xsd:int')
//        )
//);
$server->register("procesaDocumento", array(
    "id_doc" => "xsd:integer",
    "tipo_doc" => "xsd:string",
    "desc_doc" => "xsd:string", "id_doc_sasyc" => "xsd:integer",
    "ref_doc" => "xsd:string",
    "num_op" => "xsd:integer",
    "tipo_evento" => "xsd:string",
        ), array("return" => "xsd:string"),
        /* array('return' => 'tns:detalle'), */ "http://localhost/sasyc/app/", "http://localhost/sasyc/app/procesar/procesaDocumento", "rpc", "encoded", "Procesa Eventos de Documentos");
$HTTP_RAW_POST_DATA = file_get_contents("php://input");
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : "";
$server->service($HTTP_RAW_POST_DATA);
