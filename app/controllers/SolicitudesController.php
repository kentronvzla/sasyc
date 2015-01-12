<?php

class SolicitudesController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function getEliminar($idSolicitud) {
        Candidato::destroy($idSolicitud);
        return Redirect::to('')->with('mensaje', 'Se borro la solicitud correctamente.');
    }

    public function postModificar() {
        $data['nuevo'] = false;
        $solicitud = Solicitud::findOrNew(Input::get('id'));
        $solicitud->fill(Input::all());
        if ($solicitud->save()) {
            return Redirect::to('solicitud/modificar/' . $solicitud->id, $data)
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
        $data['beneficiario'] = Persona::findOrNew($data['solicitud']->persona_beneficiario_id);
        $data['solicitante'] = Persona::findOrNew($data['solicitud']->persona_solicitante_id);
        return View::make("manejosolicitudes.plantilla", $data);
    }

    public function getNueva() {
        $data['nuevo'] = true;
        $data['solicitud'] = new Solicitud();
        $data['personaSolicitante'] = new Persona();
        $data['personaBeneficiario'] = new Persona();
        return View::make("manejosolicitudes.plantilla", $data);
    }

    public function postNueva() {
        $data['nuevo'] = false;
        $solicitud = Solicitud::crear(Input::all());
        if (!$solicitud->hasErrors()) {
            Session::set('solicitud_nueva', $solicitud->toArray());
            return Redirect::to('solicitud/modificar', $data);
        } else {
            return Redirect::back()->withInput()->withErrors($solicitud->getErrors());
        }
    }
}
