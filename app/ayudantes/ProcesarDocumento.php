<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ayudantes;

use Oracle\DocumentosOrigen;
use Oracle\CtasDocAdic;
use Oracle\ComprobDetAdic;
use Oracle\RengSumAdic;
use Documentossasyc;
use Solicitud;
use Presupuesto;

/**
 * Description of ProcesarDocumento
 *
 * @author Reysmer Valle
 */
class ProcesarDocumento {

    public function buscarDefEvento($solicitud) {


        list($data, $procesos, $eventos, $i) = array(array(), array(), array(), 0);

        $presupuestos = \DB::select('SELECT beneficiario_id, proceso_id, documento_id, SUM(montoapr) as monto_total_apr, moneda FROM presupuestos WHERE solicitud_id =' . $solicitud->id . ' GROUP BY beneficiario_id, proceso_id, documento_id, moneda');

        foreach ($presupuestos as $presupuesto) {
            $consulta = \DB::select("SELECT pro.id, nombre, tipo_doc, ind_cantidad, "
                            . " ind_monto, ind_beneficiario "
                            . " FROM procesos as pro, "
                            . " defeventosasyc as def "
                            . " WHERE pro.id = " . $presupuesto->proceso_id
                            . " AND  def.id = pro.defeventosasyc_id "
                            . " GROUP BY pro.id, nombre, tipo_doc, ind_cantidad, "
                            . " ind_monto, ind_beneficiario");
            array_push($procesos, $consulta);
        }

        $procesos = $this->ordenarArreglo($procesos);

        $t_evento = "GEN";

        for ($i; $i < count($procesos); $i++) {
            $consulta = \DB::select("SELECT id, tipo_doc, tipo_evento, ind_aprueba_auto, "
                            . " ind_doc_ext, ind_ctas_adic, "
                            . " ind_reng_adic, ind_detcomp_adic "
                            . " FROM defeventosasyc "
                            . " WHERE tipo_doc ='" . $procesos[$i]->tipo_doc .
                            "' AND tipo_evento = '" . $t_evento . "'");
            if (!empty($consulta))
                array_push($eventos, $consulta);
        }

        $eventos = $this->ordenarArreglo($eventos);

        $data['solicitud'] = $solicitud['attributes'];
        $data['presupuestos'] = $presupuestos;
        $data['procesos'] = $procesos;
        $data['eventos'] = $eventos;

        return $data;
    }

    public function insertarDocumentos($data) {
        list($t_evento, $rsp_pkg, $mensaje) = array("GEN", array(), array());
        foreach ($data['presupuestos'] as $presupuesto) {
            $evento = \DB::select("SELECT pro.id,"
                            . " pro.nombre,"
                            . " pro.ind_cantidad,"
                            . " pro.ind_monto,"
                            . " pro.ind_beneficiario,"
                            . " def.tipo_doc,"
                            . " def.tipo_evento,"
                            . " def.ind_aprueba_auto,"
                            . " def.ind_doc_ext,"
                            . " def.ind_ctas_adic,"
                            . " def.ind_reng_adic,"
                            . " def.ind_detcomp_adic"
                            . " FROM procesos AS pro"
                            . " INNER JOIN defeventosasyc AS def ON pro.defeventosasyc_id = def.id"
                            . " WHERE pro.id =" . $presupuesto->proceso_id
                            . " AND tipo_evento = '" . $t_evento . "'"
            );
            if (!empty($evento)) {

                if ($presupuesto->documento_id == null) {
                    $doc_origen = $this->cargarDocOrigen($data, $presupuesto, $evento, 'nuevo');
//                    dump($doc_origen['attributes']);
                    if ($doc_origen->save()) {

                        $doc_sasyc = $this->cargarDocSasyc($data, $evento, $doc_origen, 'nuevo');
//                        dump($doc_sasyc['attributes']);
                        if ($doc_sasyc->save()) {
                            $this->cargarPresupuesto($data, $evento, $presupuesto, $doc_sasyc);
                        }
                        $mensaje = $this->insertarAdicionales($data, $doc_origen->iddoc);
                        if (!empty($mensaje)) {
                            return $mensaje;
                        } else {
                            $pkg = $this->llamarPackage($doc_origen->iddoc, 'nuevo');
                            array_push($rsp_pkg, $pkg);
                            $this->atualizarEstatusPresupuesto($data, $evento, $presupuesto);
                        }
                    }
                } else {
                    $doc_origen = $this->cargarDocOrigen($data, $presupuesto, $evento, 'viejo');
//                    dump($doc_origen['attributes']);
                    if ($doc_origen->save()) {

                        $doc_sasyc = $this->cargarDocSasyc($data, $evento, $doc_origen, 'viejo');
//                        dump($doc_sasyc['attributes']);
                        if ($doc_sasyc->save()) {
                            $this->cargarPresupuesto($data, $evento, $presupuesto, $doc_sasyc);
                        }
                        $mensaje = $this->insertarAdicionales($data, $doc_origen->iddoc);
                        if (!empty($mensaje)) {
                            return $mensaje;
                        } else {
                            $valida_sts = $this->validarStatus($data, $evento, $presupuesto, $doc_origen->iddoc);
                            if ($valida_sts) {
                                $pkg = $this->llamarPackage($doc_origen->iddoc, 'viejo');
                                array_push($rsp_pkg, $pkg);
                            }
                            $this->atualizarEstatusPresupuesto($data, $evento, $presupuesto);
                        }
                    }
                }
            } else {
                $mensaje['errores'] = 'No se puede aprobar la solicitud, defina al menos un tipo de documento';
                return $mensaje;
            }
        }
        return $mensaje;
    }

    public function insertarAdicionales($data, $doc_ori) {
        list($mensaje) = array([]);
        $this->eliminarAdicionales($doc_ori);
        $this->insertarRengSumAdic($data, $doc_ori);
        $this->insertarCtasDocAdic($data, $doc_ori);
        $this->insertarComprobDetAdic($data, $doc_ori);
        return $mensaje;
    }

    public function eliminarAdicionales($doc_ori) {
        $db = \DB::connection('oracle');
        $ctas_doc_adic_borradas = $db->delete("DELETE FROM ctas_doc_adic WHERE iddoc =" . $doc_ori . "");
        $rengs_sum_adic_borradas = $db->delete("DELETE FROM reng_sum_adic WHERE iddoc = " . $doc_ori . "");
        $compros_det_adic_borradas = $db->delete("DELETE FROM det_comprob_adic WHERE iddoc = " . $doc_ori . "");
        return;
    }

    public function llamarPackage($doc_ori, $accion) {
        $param0;
        $param1 = $doc_ori;
        $param2 = 'SASC';
//        $params = compact('param0', 'param1', 'param2');
        $db = \DB::connection('oracle');
//        $db->statement("BEGIN :param0 := PROC_MENSAJERO.GENAPRUEBA_DOC(:param1, :param2); END;",array('param0' => $param0, 'param1' => $param1, 'param2' => $param2));
//        if($accion=='nuevo')
        $stmt = $db->getPdo()->prepare("BEGIN :param0 := PROC_MENSAJERO.GENAPRUEBA_DOC(:param1, :param2); END;");
//        else
//            $stmt = $db->getPdo()->prepare("BEGIN :param0 := PROC_MENSAJERO.APRUEBA_DOC(:param1, :param2); END;");

        $stmt->bindParam(':param0', $param0, \PDO::PARAM_STR, 255);
        $stmt->bindParam(':param1', $param1, \PDO::PARAM_INT);
        $stmt->bindParam(':param2', $param2, \PDO::PARAM_STR);
        $stmt->execute();

        if (!empty($param0) || $param0 != null)
            return true;
        else
            return false;
    }

    public function atualizarEstatusPresupuesto($data, $evento, $presupuesto) {
        $presupuestos_model = Presupuesto::where('solicitud_id', '=', $data['solicitud']['id'])
                        ->where('proceso_id', '=', $evento[0]->id)
                        ->where('beneficiario_id', '=', $presupuesto->beneficiario_id)->get();
        if ($evento[0]->ind_aprueba_auto == true) {
            if (!empty($presupuestos_model)) {
                foreach ($presupuestos_model as $presupuesto_model) {
                    $presupuesto_model->estatus_doc = "APR";
                    $presupuesto_model->save();
                }
            }
        } else {
            if (!empty($presupuestos_model)) {
                foreach ($presupuestos_model as $presupuesto_model) {
                    $presupuesto_model->estatus_doc = "PPA";
                    $presupuesto_model->save();
                }
            }
        }
        return;
    }

    public function validarStatus($data, $evento, $presupuesto, $doc_ori) {
        list($valida_sts) = array(false);
        $presupuestos_model = Presupuesto::where('solicitud_id', '=', $data['solicitud']['id'])
                        ->where('documento_id', '=', $doc_ori)
                        ->where('proceso_id', '=', $evento[0]->id)
                        ->where('beneficiario_id', '=', $presupuesto->beneficiario_id)->get();
        if (!empty($presupuestos_model)) {
            foreach ($presupuestos_model as $presupuesto_model) {
                if ($presupuesto_model->estatus_doc == "DEV") {
                    $valida_sts = true;
                }
            }
        }
        return $valida_sts;
    }

    public function atualizarEstatus($data, $autorizador_id = null) {
        list($cont_aprobados, $cont_devueltos, $cont_procesados, $cont_total) = array(0, 0, 0, 0);
        $presupuestos_model = Presupuesto::where('solicitud_id', '=', $data['solicitud']['id'])->get();
        $cont_total = count($presupuestos_model);
        if (!empty($presupuestos_model)) {
            foreach ($presupuestos_model as $presupuesto_model) {
                if ($presupuesto_model->estatus_doc == "APR") {
                    $cont_aprobados++;
                }
                if ($presupuesto_model->estatus_doc == "PPA") {
                    $cont_procesados++;
                }
                if ($presupuesto_model->estatus_doc == "DEV") {
                    $cont_devueltos++;
                }
            }
        }

        $solicitud_model = Solicitud::where('id', '=', $data['solicitud']['id'])->first();
        if ($cont_aprobados == $cont_total) {
            if (!empty($solicitud_model)) {
                $solicitud_model->estatus = "APR";
                $solicitud_model->save();
            }
        } elseif ($cont_devueltos > 0) {
            if (!empty($solicitud_model)) {
                $solicitud_model->estatus = "DEV";
                $solicitud_model->save();
            }
        } elseif ($cont_procesados > 0) {
            if (!empty($solicitud_model)) {
                $solicitud_model->estatus = "PPA";
                $solicitud_model->usuario_autorizacion_id = $autorizador_id;
                $solicitud_model->beneficiario_json = json_encode($solicitud_model->personaBeneficiario->toArray());
                if (is_object($solicitud_model->personaSolicitante)) {
                    $solicitud_model->solicitante_json = json_encode($solicitud_model->personaSolicitante->toArray());
                }
                $solicitud_model->total_ingresos = tm($solicitud_model->total_ingresos);

                $solicitud_model->save();
            }
        }
        return;
    }

    public function cargarDocOrigen($data, $presupuesto, $evento, $accion) {
        list($data['sol_benef'], $data['sol_acc_int']) = array(Solicitud::find($data['solicitud']['id'])->personaBeneficiario['attributes'], Solicitud::find($data['solicitud']['id'])->area->tipoAyuda->cod_acc_int);
        $desc_doc = "Caso N: " . $data['solicitud']['num_solicitud'] . ". Beneficiario: " . $data['sol_benef']['nombre'] . " " . $data['sol_benef']['apellido'] . ". C.I.:" . $data['sol_benef']['ci'] . ". " . $data['solicitud']['descripcion'];

        if ($accion == 'nuevo') {
            $doc_origen = new DocumentosOrigen();
            $doc_origen->stsdoc = "PRO";                                // PRO
            $doc_origen->usrcre = "SASC";
            $doc_origen->usrsts = "SASC";
            $doc_origen->fecsts = date("Y-m-d H:i:s");
        } else {
            $doc_origen = DocumentosOrigen::findOrFail($presupuesto->documento_id);
        }
        $doc_origen->descdoc = substr($desc_doc, 0, 60);
        $doc_origen->origen = 'SASC';
        if ($presupuesto->beneficiario_id == null)
            $doc_origen->numbenef = 99999999;
        else
            $doc_origen->numbenef = $presupuesto->beneficiario_id;      // BENEFICIARIO

        $doc_origen->refdoc = $data['solicitud']['num_solicitud'];      // NO. SOLICITUD
        $doc_origen->mtodoc = $presupuesto->monto_total_apr;            // PRESUPUESTO                                                 
        $doc_origen->fecdoc = date("Y-m-d H:i:s");
        $doc_origen->tipodoc = $evento[0]->tipo_doc;
        $doc_origen->ano = date("Y");
        $doc_origen->indreverso = "N";
        $doc_origen->mensaje = null;
        $doc_origen->numcomprom = null;
        $doc_origen->iddocref = null;
        $doc_origen->ccosto = \Configuracion::get('ccosto');
        $doc_origen->codproyint = $data['sol_acc_int'];
        $doc_origen->usrcod = null;
        $doc_origen->usrrec = null;
        $doc_origen->usrver = null;
        $doc_origen->iddocfis = null;
        $doc_origen->fecvencdoc = null;
        $doc_origen->sistfecvencdoc = null;
        $doc_origen->fecref = null;
        $doc_origen->codsisreg = null;
        $doc_origen->numop = null;
        $doc_origen->idpagoorigen = null;
        $doc_origen->iddocorigtransf = null;
        $doc_origen->iddoctransf = null;
        $doc_origen->descdocext = $desc_doc;
        $doc_origen->codsitio = \Configuracion::get('sitio');
        $doc_origen->codmoneda = \Configuracion::get('moneda_presupuesto');
        $doc_origen->tasa = 1;
        $doc_origen->montoorig = $presupuesto->monto_total_apr;
        $doc_origen->mtodocant = null;
        $doc_origen->codmonedaant = null;
        $doc_origen->codmonedamtodoc = \Configuracion::get('moneda_presupuesto');
        $doc_origen->codundorig = "*";
        $doc_origen->codundadmorig = "*";
        $doc_origen->codundadmpro = "*";
        $doc_origen->numbenefaux = null;
        $doc_origen->idprocexonera = null;
        $doc_origen->porcentaje = null;
        $doc_origen->mtobaseded = null;
        $doc_origen->iddocexterno = null;

        return $doc_origen;
    }

    public function cargarDocSasyc($data, $evento, $doc_origen, $action) {
        list($data['sol_benef']) = array(Solicitud::find($data['solicitud']['id'])->personaBeneficiario['attributes']);
        $desc_doc = "Caso N: " . $data['solicitud']['num_solicitud'] . ". Beneficiario: " . $data['sol_benef']['nombre'] . " " . $data['sol_benef']['apellido'] . ". C.I.:" . $data['sol_benef']['ci'] . ". " . $data['solicitud']['descripcion'];

        if ($action == 'nuevo') {
            $doc_sasyc = new Documentossasyc();
        } else {
            $doc_sasyc = Documentossasyc::where('documento_id', '=', $doc_origen->iddoc)->first();
        }
        $doc_sasyc->documento_id = $doc_origen->iddoc;
        $doc_sasyc->tipo_doc = $doc_origen->tipodoc;
        $doc_sasyc->tipo_evento = $evento[0]->tipo_evento;
        $doc_sasyc->descripcion = $desc_doc;
        $doc_sasyc->fecha = date("Y-m-d H:i:s");
        $doc_sasyc->estatus = 'PRO';
        $doc_sasyc->solicitud = $data['solicitud']['id'];
        $doc_sasyc->ref_doc = $data['solicitud']['num_solicitud'];
        $doc_sasyc->num_op = null;
        $doc_sasyc->mensaje = null;
        $doc_sasyc->id_doc_ref = null;
        $doc_sasyc->ind_aprueba_auto = $evento[0]->ind_aprueba_auto;
        $doc_sasyc->ind_doc_ext = $evento[0]->ind_doc_ext;
        $doc_sasyc->ind_ctas_adic = $evento[0]->ind_ctas_adic;
        $doc_sasyc->ind_reng_adic = $evento[0]->ind_reng_adic;
        $doc_sasyc->ind_detcomp_adic = $evento[0]->ind_detcomp_adic;
        $doc_sasyc->version = 0;

        return $doc_sasyc;
    }

    public function cargarPresupuesto($data, $evento, $presupuesto, $doc_sasyc) {

        $ptos_model = Presupuesto::where('solicitud_id', '=', $data['solicitud']['id'])
                        ->where('proceso_id', '=', $evento[0]->id)
                        ->where('beneficiario_id', '=', $presupuesto->beneficiario_id)->get();
        foreach ($ptos_model as $pto_model) {
            $pto_model->documento_id = $doc_sasyc->documento_id;
            $pto_model->save();
        }
        return;
    }

    public function cargarCtasAdic($registro) {
        $ctasdocadic = new CtasDocAdic();
        $ctasdocadic->iddoc = $registro->documento_id;
        $ctasdocadic->codaccint = $registro->cod_acc_int;
        $ctasdocadic->ccosto = \Configuracion::get('ccosto');
        $ctasdocadic->codcta = $registro->cod_cta;
        $ctasdocadic->codprograma = null;
        $ctasdocadic->monto = $registro->montoapr;
        $ctasdocadic->registro = null;
        return $ctasdocadic;
    }

    public function cargarRengAdic($registro, $catalogos = null) {
        $rengsumadic = new RengSumAdic();
        $rengsumadic->iddoc = $registro->documento_id;
        if ($catalogos != null) {
            foreach ($catalogos as $catalogo) {
                if (($catalogo->tipoitem == 'B') || ($catalogo->tipoitem == 'M')) {
                    $rengsumadic->tiporeng = "MT";
                    $rengsumadic->coditem = $catalogo->coditem;
                } else {
                    $rengsumadic->tiporeng = "SV";
                    $rengsumadic->codserv = $catalogo->codserv;
                }
            }
        } else {
            $rengsumadic->tiporeng = "SV";
        }
        $rengsumadic->descreng = $registro->nombre;
        $rengsumadic->descadiitem = $registro->descripcion;
        $rengsumadic->unidbasica = "UND";
        if ($registro->cantidad != null) {
            $rengsumadic->cantsol = $registro->cantidad;
        } else {
            $rengsumadic->cantsol = 0;
        }
        $rengsumadic->precio = 0;
        $rengsumadic->porcimptos = \Configuracion::get('porcimpuesto');
        return $rengsumadic;
    }

    public function cargarDetComAdic($registro) {
        $comprobdetadic = new ComprobDetAdic();
        $comprobdetadic->iddoc = $registro->documento_id;
        $comprobdetadic->codcta = $registro->cod_cta;
        $comprobdetadic->mtoneto = $registro->monto;
        $comprobdetadic->porcimpto = \Configuracion::get('porcimpuesto');
        $comprobdetadic->indimptoman = 'N';
        $num = (($comprobdetadic->mtoneto * $comprobdetadic->porcimpto) / 100);
        $num = number_format($num, 2, '.', '');
        $num = floatval($num);
        $comprobdetadic->mtoimpuesto = $num;
        $comprobdetadic->mtototal = $comprobdetadic->mtoneto + $comprobdetadic->mtoimpuesto;
        return $comprobdetadic;
    }

    public function insertarCtasDocAdic($data, $doc_ori) {
        $sql = "SELECT pre.solicitud_id, pre.documento_id, pre.moneda, pre.beneficiario_id, tayu.cod_acc_int, req.cod_cta, SUM(pre.montoapr) as montoapr 
            FROM presupuestos as pre, solicitudes as sol, areas as are, tipo_ayudas as tayu, procesos as pro, requerimientos as req, defeventosasyc as def
            WHERE solicitud_id =" . $data['solicitud']['id'] .
                " AND documento_id =" . $doc_ori
                . " AND def.ind_ctas_adic = true "
                . " AND sol.id = pre.solicitud_id "
                . " AND are.id = sol.area_id "
                . " AND tayu.id = are.tipo_ayuda_id "
                . " AND pro.id = pre.proceso_id "
                . " AND def.id = pro.defeventosasyc_id "
                . " AND req.id = pre.requerimiento_id "
                . " GROUP BY pre.solicitud_id, pre.documento_id, pre.beneficiario_id, tayu.cod_acc_int, req.cod_cta, pre.moneda";
        $registros = \DB::select($sql);
        if (!empty($registros)) {
            foreach ($registros as $registro) {
                $ctasdocadic = $this->cargarCtasAdic($registro);
//                dump($ctasdocadic['attributes']);
                $ctasdocadic->save();
            }
        }
        return;
    }

    public function insertarRengSumAdic($data, $doc_ori) {
        $sql = "SELECT pre.solicitud_id, pre.documento_id, req.cod_item, req.nombre, req.descripcion, SUM(pre.cantidad) cantidad
            FROM presupuestos as pre, procesos as pro, requerimientos as req, defeventosasyc as def
            WHERE solicitud_id =" . $data['solicitud']['id']
                . " AND documento_id =" . $doc_ori
                . " AND def.ind_reng_adic = true "
                . " AND pro.id = pre.proceso_id "
                . " AND def.id = pro.defeventosasyc_id "
                . " AND req.id = pre.requerimiento_id"
                . " GROUP BY pre.solicitud_id, pre.documento_id, req.cod_item, req.nombre, req.descripcion";
        $registros = \DB::select($sql);
        if (!empty($registros)) {
            foreach ($registros as $registro) {
                if ($registro->cod_item != null) {
                    $sql = "SELECT CODITEM, CODSERV, TIPOITEM
                        FROM V_CATALOGO
                        WHERE CODIGO ='" . $registro->cod_item . "'";
                    $catalogos = \DB::connection('oracle')->select($sql);
                } else {
                    $catalogos = null;
                }
                $rengsumadic = $this->cargarRengAdic($registro, $catalogos);
                $rengsumadic->save();
//                dump($rengsumadic['attributes']);
            }
        }
        return;
    }

    public function insertarComprobDetAdic($data, $doc_ori) {
        $sql = "SELECT pre.solicitud_id, pre.documento_id, req.cod_cta, SUM(pre.montoapr) monto
            FROM presupuestos as pre,  procesos as pro, requerimientos as req, defeventosasyc as def
            WHERE solicitud_id = " . $data['solicitud']['id']
                . " AND documento_id =" . $doc_ori
                . " AND def.ind_detcomp_adic = true "
                . " AND pro.id = pre.proceso_id "
                . " AND def.id = pro.defeventosasyc_id"
                . " AND req.id = pre.requerimiento_id"
                . " GROUP BY pre.solicitud_id, documento_id, req.cod_cta";
        $registros = \DB::select($sql);
        if (!empty($registros)) {
            foreach ($registros as $registro) {
                $comprobdetadic = $this->cargarDetComAdic($registro);
//                dump($comprobdetadic['attributes']);
                $comprobdetadic->save();
            }
        }
        return;
    }

    public function ordenarArreglo($arreglo) {
        list ($j, $aux_arr) = array(0, array());
        for ($j; $j < count($arreglo); $j++) {
            array_push($aux_arr, $arreglo[$j][0]);
        }
        return $aux_arr;
    }

}
