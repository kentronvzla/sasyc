<?php

class BeneficiarioController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function getEliminar($idPersona) {
        Candidato::destroy($idPersona);
        return Redirect::to('')->with('mensaje', 'Se borro la persona correctamente.');
    }

    public function postModificar() {
        $beneficiario = Persona::findOrNew(Input::get('id'));
        $beneficiario->fill(Input::all());
        if ($beneficiario->save()) {
            return Redirect::to('beneficiario/modificar/' . $beneficiario->id)
                    ->with("mensaje", "Se guardó el beneficiario correctamente.");
        } else {
            return Redirect::back()->withInput()->withErrors($beneficiario->getErrors());
        }
    }

    public function getModificar($id = null) {
        if (is_null($id)) {
            $data['nuevo'] = false;
        }
        $data['solicitud'] = Solicitud::findOrNew($id);
        $data['beneficiario'] = $data['solicitud']->beneficiario;
        return View::make("manejosolicitudes.plantilla", $data);
    }

}
