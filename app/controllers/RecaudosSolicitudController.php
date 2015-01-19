<?php

class RecaudosSolicitudController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function postModificar() {
        $recaudosolicitud = RecaudoSolicitud::findOrFail(Input::get('id'));
        $recaudosolicitud->fill(Input::all());
        $recaudosolicitud->ind_recibido = true;
        if ($recaudosolicitud->save()) {
            $data['mensaje'] = 'Datos guardados correctamente';
            $data['vista'] = $this->getModificar(Input::get('id'))->render();
            return Response::json($data);
        }
        return Response::json(['errores' => $recaudosolicitud->getErrors()], 400);
    }

    public function getModificar($recaudoSolicitudId = null) {
        $data['recaudo'] = RecaudoSolicitud::findOrNew($recaudoSolicitudId);
        if ($recaudoSolicitudId == null) {
            $data['recaudos'] = Solicitud::findOrFail(Input::get('solicitud_id'))->recaudosSolicitud;
        }else{
            $data['recaudos'] = $data['recaudo']->solicitud->recaudosSolicitud;
        }
        
        return View::make('manejosolicitudes.recaudos', $data);
    }

    public function getDescargar($recaudoSolicitudId) {
        $recaudo = RecaudoSolicitud::findOrFail($recaudoSolicitudId);
        $path = storage_path('adjuntos/' . $recaudo->solicitud_id . '/' . $recaudo->documento);
        return Response::download($path);
    }

}
