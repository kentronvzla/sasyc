<?php

class RecaudosSolicitudesController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function postModificar() {
        $recaudosolicitud = RecaudoSolicitud::findOrNew(Input::get('id'));
        $recaudosolicitud->fill(Input::all());
        if ($recaudosolicitud->save()) {
            $data['mensaje'] = 'Datos guardados correctamente';
            $data['vista'] = $this->getRecaudosSolicitud(Input::get('solicitud_id'), Input::get('id'))->render();
            return Response::json($data);
        }
        return Response::json(['errores' => $recaudosolicitud->getErrors()], 400);
    }

    public function getRecaudosSolicitud($solicitud_id, $requerimiento_id = null) {
        $data['solicitud'] = Solicitud::findOrFail($solicitud_id);
        $data['recaudossolicitud'] = $data['solicitud']->recaudos;
        return View::make('manejosolicitudes.presupuesto', $data);
    }
}
