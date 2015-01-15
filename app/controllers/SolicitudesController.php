<?php

class SolicitudesController extends BaseController {

    public function __construct() {
        parent::__construct();
    }
    
    public function postModificar() {
        Session::forget('solicitud');
        $solicitud = Solicitud::findOrNew(Input::get('id'));
        $solicitud->fill(Input::all());
        if ($solicitud->save()) {
            $data['solicitud'] = $solicitud;
            $data['mensaje'] = "Datos guardados correctamente";
            return Response::json($data);
        } else {
            return Response::json(['errores' => $solicitud->getErrors()], 400);
        }
    }

    public function getModificar($id = null) {
        if (is_null($id) && !Session::has('solicitud')) {
            $data['nuevo'] = true;
        }else{
            $data['nuevo'] = false;
        }
        if (Session::has('solicitud')) {
            $data['solicitud'] = new Solicitud(Session::get('solicitud'));
        } else {
            $data['solicitud'] = Solicitud::findOrNew($id);
        }
        $data['beneficiario'] = Persona::findOrFail($data['solicitud']->persona_beneficiario_id);
        $data['solicitante'] = Persona::findOrNew($data['solicitud']->persona_solicitante_id);
        $data['familiares'] = $data['beneficiario']->familiaresBeneficiario;
        $data['familiar'] = new Persona();
        $data['presupuesto'] = new Presupuesto();
        return View::make("manejosolicitudes.plantilla", $data);
    }

    public function getNueva() {
        Session::forget('solicitud');
        $data['nuevo'] = true;
        $data['solicitud'] = new Solicitud();
        $data['personaSolicitante'] = new Persona();
        $data['personaBeneficiario'] = new Persona();
        $data['familiares'] = $data['personaSolicitante']->familiaresBeneficiario;
        return View::make("manejosolicitudes.plantilla", $data);
    }

    public function postNueva() {
        $solicitud = Solicitud::crear(Input::all());
        if (!$solicitud->hasErrors()) {
            Session::set('solicitud', $solicitud->toArray());
            return Redirect::to('solicitudes/modificar');
        } else {
            return Redirect::back()->withInput()->withErrors($solicitud->getErrors());
        }
    }
}
