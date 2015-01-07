<?php

class SolicitudController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function getEliminar($idSolicitud) {
        Candidato::destroy($idSolicitud);
        return Redirect::to('')->with('mensaje', 'Se borro la solicitud correctamente.');
    }

    public function postModificar() {
        $solicitud = Solicitud::findOrNew(Input::get('id'));
        $solicitud->fill(Input::all());
        if ($solicitud->save()) {
            return Redirect::to('solicitud/modificar/' . $solicitud->id)
                    ->with("mensaje", "Se guardó la solicitud correctamente.");
        } else {
            return Redirect::back()->withInput()->withErrors($solicitud->getErrors());
        }
    }

    public function getModificar($id = null) {
        if (is_null($id)) {
            $data['nuevo'] = false;
        }
        $data['solicitud'] = Solicitud::findOrNew($id);
        $data['beneficiario'] = $data['solicitud']->solicitante;
        $data['solicitante'] = $data['solicitud']->solicitante;
        return View::make("manejosolicitudes.plantilla", $data);
    }

}
