<?php
namespace app;
//header("Content-Type:text/xml");
//ini_set('display_errors','Off');
//ini_set("soap.wsdl_cache_enabled", "0"); 
require_once('/ayudantes/webservices/nusoap.php');
//require_once('/ayudantes/ProcesarDocumento.php');
//require_once('/models/Requerimiento.php');

//use ayudantes\ProcesarDocumento;

//use models\Requerimiento;

function procesaDocumento($id_doc, $tipo_evento) {
    //$requerimientos = Requerimientos::find($id_doc, array('id', 'nombre', 'descripcion', 'cod_cta'));
    return 1001;
//    return array(
//        'id' => $requerimientos['id'],
//        'nombre' => $requerimientos['nombre'],
//        'descripcion' => $requerimientos['descripcion'],
//        'cod_cta' => $requerimientos['cod_cta']
//    );
//    
//    
//    $db = 'sasyc_desarrollo';
//    $host = 'appwebdesa.kentron.com.ve';
//    $username = 'sasyc';
//    $password = 'sasyc';
//    $dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";
//
//    try {
//        $dbh = new PDO($dsn);
//        if ($dbh) {
////            echo "Se conectó a la base de datos ".$db." satisfactoriamente";
//            $sql = "SELECT id,nombre,descripcion,cod_cta FROM requerimientos WHERE id ='" . $id_doc . "';";
//            $stmt = $dbh->query($sql);
//            if ($stmt === false) {
//                echo "Error al ejecutar el query: $sql";
////                die("Error al ejecutar el query: $sql");
//            } else {
////                if (count($row = $stmt->fetch(PDO::FETCH_ASSOC))>0) {
////                        return htmlspecialchars($row['cod_cta']);
////                } else {
////                    return 1002;
////                }
//                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
//                    return array(
//                        'id' => $row['id'],
//                        'nombre' => $row['nombre'],
//                        'descripcion' => $row['descripcion'],
//                        'cod_cta' => $row['cod_cta']
//                    );
//                endwhile;
//            }
//        }
//    } catch (Exception $e) {
//        echo 'Excepción capturada: ', $e->getMessage(), "\n";
//    } catch (PDOException $PDOe) {
//        echo 'Excepción capturada: ', $PDOe->getMessage(), "\n";
//    }
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
$server->register("procesaDocumento",
        array("id_doc" => "xsd:integer","tipo_evento"=> "xsd:string"),
        array("return" => "xsd:integer"),
        /*array('return' => 'tns:detalle'),*/
        "http://localhost/sasyc/app/",
        "http://localhost/sasyc/app/procesar/procesaDocumento",
        "rpc", "encoded", "Procesa Eventos de Documentos");
$HTTP_RAW_POST_DATA = file_get_contents("php://input");
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : "";
$server->service($HTTP_RAW_POST_DATA);