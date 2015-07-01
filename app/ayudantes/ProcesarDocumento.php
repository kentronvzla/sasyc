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
            $consulta = \DB::select('SELECT id, nombre, tipo_doc, ind_cantidad, ind_monto, ind_beneficiario  FROM procesos WHERE id =' . $presupuesto->proceso_id . ' GROUP BY id, nombre, tipo_doc, ind_cantidad, ind_monto, ind_beneficiario');
            array_push($procesos, $consulta);
        }

        $procesos = $this->ordenarArreglo($procesos);

        $t_evento = "GEN";

        for ($i; $i < count($procesos); $i++) {
            $consulta = \DB::select("SELECT id, tipo_doc, tipo_evento, ind_aprueba_auto, ind_doc_ext, ind_ctas_adic, ind_reng_adic, ind_detcomp_adic FROM defeventosasyc WHERE tipo_doc ='" . $procesos[$i]->tipo_doc . "' AND tipo_evento = '" . $t_evento . "'");
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

    public function ordenarArreglo($arreglo) {
        list ($j, $aux_arr) = array(0, array());
        for ($j; $j < count($arreglo); $j++) {
            array_push($aux_arr, $arreglo[$j][0]);
        }
        return $aux_arr;
    }

    public function InsertarDocOrigen($data, $solicitud) {
        list($ciclo) = array(true);
        foreach ($data['presupuestos'] as $presupuesto) {
            if ($presupuesto->documento_id == null) {
                $t_evento = "GEN";
                $evento = \DB::select("SELECT t1.id,t1.nombre,t1.tipo_doc,t1.ind_cantidad,t1.ind_monto,t1.ind_beneficiario,t2.tipo_evento,t2.ind_aprueba_auto,t2.ind_doc_ext,t2.ind_ctas_adic,t2.ind_reng_adic,t2.ind_detcomp_adic FROM procesos AS t1 INNER JOIN defeventosasyc AS t2 ON t1.tipo_doc = t2.tipo_doc WHERE t1.id =" . $presupuesto->proceso_id . " AND tipo_evento ='" . $t_evento . "'");

                if (!empty($evento)) {
                    $doc_origen = $this->cargarDocOrigen($data, $presupuesto, $evento);
//                    if ($doc_origen->save()) {
                    $doc_sasyc = $this->cargarDocSasyc($data, $evento, $doc_origen);
//                        if ($doc_sasyc->save()) {
                    if ($ciclo) {
                        $presupuesto_model = $this->cargarPresupuesto($data, $doc_sasyc);
                        $ciclo = false;
                    }
                    if ($evento[0]->ind_ctas_adic) {
                        $ctas_adic = $this->cargarCtasAdic($doc_origen);
                    }if ($evento[0]->ind_reng_adic) {
                        $reng_adic = $this->cargarRengAdic($doc_origen);
                    }
                    if ($evento[0]->ind_detcomp_adic) {
                        $detcomp_adic = $this->cargarDetComAdic($doc_origen);
                    }
                    exit();
//                        } else {
//                            if (Request::ajax()) {
//                                return Response::json(['errores' => $doc_sasyc->getErrors()], 400);
//                            }
//                            return Redirect::back()->withInput()->withErrors($doc_sasyc->getErrors());
//                        }
//                    } else {
//                        if (Request::ajax()) {
//                            return Response::json(['errores' => $doc_origen->getErrors()], 400);
//                        }
//                        return Redirect::back()->withInput()->withErrors($doc_origen->getErrors());
//                    }
                }
            }
        }
        exit();
    }

    public function cargarDocOrigen($data, $presupuesto, $evento) {
        list($data['sol_benef'], $data['sol_acc_int']) = array(Solicitud::find($data['solicitud']['id'])->personaBeneficiario['attributes'], Solicitud::find($data['solicitud']['id'])->area->tipoAyuda->cod_acc_int);
        $desc_doc = "Caso N°: " . $data['solicitud']['num_solicitud'] . ". Beneficiario: " . $data['sol_benef']['nombre'] . " " . $data['sol_benef']['apellido'] . ". C.I.:" . $data['sol_benef']['ci'] . ". " . $data['solicitud']['descripcion'];

        $doc_origen = new DocumentosOrigen();
        $doc_origen->descdoc = substr($desc_doc, 0, 60);
        $doc_origen->origen = 'SASC';
        $doc_origen->numbenef = $presupuesto->beneficiario_id;          // BENEFICIARIO
        $doc_origen->refdoc = $data['solicitud']['num_solicitud'];      // NO. SOLICITUD
        $doc_origen->mtodoc = $presupuesto->monto_total_apr;            // PRESUPUESTO   
        $doc_origen->stsdoc = "PRO";                                    // PRO
        $doc_origen->fecdoc = date("Y-m-d H:i:s");
        $doc_origen->tipodoc = $evento[0]->tipo_doc;
        $doc_origen->ano = date("Y");
        $doc_origen->usrsts = "SASC";
        $doc_origen->fecsts = date("Y-m-d H:i:s");
        $doc_origen->indreverso = "N";
        $doc_origen->mensaje = null;
        $doc_origen->numcomprom = null;
        $doc_origen->iddocref = null;
        $doc_origen->ccosto = \Configuracion::get('ccosto');
        $doc_origen->codproyint = $data['sol_acc_int'];
        $doc_origen->usrcre = null;
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
        $doc_origen->codsitio = null;
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

    public function cargarDocSasyc($data, $evento, $doc_origen) {
        list($data['sol_benef']) = array(Solicitud::find($data['solicitud']['id'])->personaBeneficiario['attributes']);
        $desc_doc = "Caso N°: " . $data['solicitud']['num_solicitud'] . ". Beneficiario: " . $data['sol_benef']['nombre'] . " " . $data['sol_benef']['apellido'] . ". C.I.:" . $data['sol_benef']['ci'] . ". " . $data['solicitud']['descripcion'];

        $doc_sasyc = new Documentossasyc();
        $doc_sasyc->documento_id = $doc_origen->id_doc;
        $doc_sasyc->tipo_doc = $doc_origen->tipodoc;
        $doc_sasyc->tipo_evento = $evento[0]->tipo_evento;
        $doc_sasyc->descripcion = '';
        $doc_sasyc->fecha = date("Y-m-d H:i:s");
        $doc_sasyc->estatus = 'PRO';
        $doc_sasyc->solicitud = $data['solicitud']['num_solicitud'];
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

    public function cargarPresupuesto($data, $doc_sasyc) {

        $presupuestos_model = Presupuesto::where('solicitud_id', '=', $data['solicitud']['id'])->get();
        foreach ($presupuestos_model as $presupuesto_model) {
            $presupuesto_model->documento_id = $doc_sasyc->documento_id;
            //$presupuesto_model->save();
        }
        return;
    }

    public function cargarCtasAdic($doc_origen) {
        $ctasdocadic = new CtasDocAdic();
        $ctasdocadic->iddoc = $doc_origen->id_doc;
        $ctasdocadic->codaccint = $doc_origen->codproyint;
        $ctasdocadic->ccosto = $doc_origen->ccosto;
        $ctasdocadic->codcta = 403180100;
        $ctasdocadic->codprograma = null;
        $ctasdocadic->monto = $doc_origen->mtodoc;
        $ctasdocadic->registro = null;
        return $ctasdocadic;
                
    }

    public function cargarRengAdic($doc_origen) {
        $rengsumadic = new RengSumAdic();
        $rengsumadic->iddoc = 13628;
        $rengsumadic->tiporeng = "MT";
        $rengsumadic->coditem = "148147-1";
        $rengsumadic->codserv = null;
        $rengsumadic->descreng = null;
        $rengsumadic->descadiitem = null;
        $rengsumadic->unidbasica = "UND";
        $rengsumadic->cantsol = 68;
        $rengsumadic->precio = 650.50;
        $rengsumadic->porcimptos = 15;
        return $rengsumadic;
    }

    public function cargarDetComAdic($doc_origen) {
        $comprobdetadic = new ComprobDetAdic();
        $comprobdetadic->iddoc = 136249;
        $comprobdetadic->codcta = 403070200;
        $comprobdetadic->mtoneto = 200.56;
        $comprobdetadic->porcimpto = 12;
        $comprobdetadic->indimptoman = 'N';
        $comprobdetadic->mtoimpuesto = 20.54;
        $comprobdetadic->mtototal = $comprobdetadic->mtoneto + $comprobdetadic->mtoimpuesto;
        return $comprobdetadic;
    }

}
