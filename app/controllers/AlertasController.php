<?php

class AlertasController extends BaseController {

    public function getIndex() {
        $id = Sentry::getUser()->id;
        $hoy = date('Y-m-d');
        $ruta = \Route::getCurrentRoute();
        $data['url'] = url($ruta->getPath());
        $data['bitacoras'] = Bitacora::where('usuario_id', '=', $id)->where('ind_atendida', '=', 'false')
                        ->where('ind_alarma', '=', 'true')->where('fecha', '<=', $hoy)->get();

        return View::make('solicitudes.alertas', $data);
    }

    public function getModificar($bitacora_id, $solicitud_id) {
        $data['bitacora'] = Bitacora::findOrFail($bitacora_id);
        $data['bitacora']->atendida();
        $data['solicitud'] = $data['bitacora']->solicitud;
        $data['bitacoras'] = $data['solicitud']->bitacoras;
        $data['nuevo'] = false;
        $data['beneficiario'] = Persona::findOrFail($data['solicitud']->persona_beneficiario_id);
        $data['solicitante'] = Persona::findOrNew($data['solicitud']->persona_solicitante_id);
        $data['familiares'] = $data['beneficiario']->getFamiliares();
        $data['familiar'] = new Persona();
        $data['recaudo'] = new RecaudoSolicitud();
        $data['recaudos'] = $data['solicitud']->recaudosSolicitud;
        $data['presupuesto'] = new Presupuesto();
        $data['presupuestos'] = $data['solicitud']->presupuestos;
        $data['parentesco'] = $data['beneficiario']->getParentesco($data['solicitante']->id);
        $data['foto'] = new FotoSolicitud();
        $data['fotos'] = $data['solicitud']->fotos;
        $data['beneficiario_kerux'] = new Oracle\Beneficiario();
        $documen = Solicitud::select('area_id')->where('id', '=', $solicitud_id)->get();
        foreach ($documen as $do) {
            $ayuda = Area::select('tipo_ayuda_id')->where('id', '=', $do['area_id'])->get();
        }
        foreach ($ayuda as $tu) {
            $reque = Requerimiento::select('nombre', 'id')->where('tipo_ayuda_id', '=', $tu['tipo_ayuda_id'])
                    ->get();
        }
        foreach ($reque as $tipodoc) {
            $docu = $tipodoc['attributes'];
            $arreglo = array_shift($docu);
            $prueba = $tipodoc->id;
            $documentos[$prueba] = $arreglo;
            $data['requerimientos'] = $documentos;
        }
        return View::make('solicitudes.plantilla', $data);
    }

    public function postModificar() {
        Session::forget('solicitud');
        $solicitud = Solicitud::findOrNew(Input::get('id'));
        $solicitud->fill(Input::all());
        if (Input::has('informe')) {
            $solicitud->reglasInforme();
        }
        if ($solicitud->save()) {
            $data['solicitud'] = $solicitud;
            $data['mensaje'] = "Datos guardados correctamente";
            if (Request::ajax()) {
                return Response::json($data);
            }
            return Redirect::to('solicitudes/modificar/' . $solicitud->id);
        } else {
            if (Request::ajax()) {
                return Response::json(['errores' => $solicitud->getErrors()], 400);
            }
            return Redirect::back()->withInput()->withErrors($solicitud->getErrors());
        }
    }

}
