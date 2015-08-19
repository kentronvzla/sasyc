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
        if (isset($data['solicitud']->area_id)) {
            $requerimientos = Requerimiento::select('id', 'nombre')->whereTipoAyudaId($data['solicitud']->area->tipo_ayuda_id)->get();
            foreach ($requerimientos as $requerimiento) {
                $requerimientof[$requerimiento->id] = $requerimiento->nombre;
                $data['requerimientos'] = $requerimientof;
            }
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
