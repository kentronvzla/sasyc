<?php

class PersonasController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function getBuscarid($id) {
        $data['persona'] = Persona::findOrFail($id);
        return Response::json($data);
    }

    public function getBuscar() {
        $persona = Persona::findOrNewByCedula(Input::get('tipo_nacionalidad_id'), Input::get('ci'));
        $data['persona'] = $persona;
        $data['vistaFamiliares'] = $this->getFamiliaressolicitante($persona->id)->render();
        $data['vistaSolicitudes'] = $this->getSolictudesAnteriores($persona->id)->render();
        return Response::json($data);
    }

    public function postCrear($beneficiario_asoc = null, $render = true) {
        $persona = Persona::findOrNewByCedula(Input::get('tipo_nacionalidad_id'), Input::get('ci'));
        $persona->fill(Input::all());
        if ($persona->save()) {
            $data['persona'] = $persona;
            $data['mensaje'] = 'Datos guardados correctamente';
            if (!is_null($beneficiario_asoc)) {
                $validator = Persona::asociar($beneficiario_asoc, $persona->id, Input::get('parentesco_id'));
                if ($validator->passes() && $render === true) {
                    $data['vista'] = $this->getFamiliar($beneficiario_asoc)->render();
                } else if ($render === true) {
                    return Response::json(['errores' => $validator->messages()], 400);
                }
            }
            return Response::json($data);
        }
        return Response::json(['errores' => $persona->getErrors()], 400);
    }

    public function postModificar() {
        $persona = Persona::findOrNew(Input::get('id'));
        $persona->fill(Input::all());
        if ($persona->save()) {
            return Response::json(['persona' => $persona, 'mensaje' => 'Datos guardados correctamente']);
        }
        return Response::json(['errores' => $persona->getErrors()], 400);
    }

    public function getFamiliar($id, $familiar_id = null) {
        $data['beneficiario'] = Persona::findOrFail($id);
        $data['familiar'] = Persona::findOrNew($familiar_id);
        $data['familiares'] = $data['beneficiario']->familiaresBeneficiario;
        #$data['parentesco_id'] = $data['beneficiario']->getParentesco($data['familiar']->id);
        return View::make('manejosolicitudes.grupofamiliar', $data);
    }

    public function deleteFamiliar($beneficiario_id) {
        $beneficiario = Persona::find($beneficiario_id);
        $beneficiario->familiaresBeneficiario()->detach(Input::get('id'));
        $data['vista'] = $this->getFamiliar($beneficiario_id)->render();
        $data['mensaje'] = "Se eliminó el familiar correctamente";
        return Response::json($data);
    }

    public function getCopiar($beneficiario_id) {
        $data['vista'] = $this->getCopiarDireccion($beneficiario_id)->render();
        $data['mensaje'] = "Dirección copiada correctamente";
        return Response::json($data);
    }
    
    public function getFamiliaressolicitante($id) {
        $data['familiares'] = Persona::findOrNew($id)->familiaresSolicitante;
        return View::make('manejosolicitudes.relacionados-lista', $data);
    }

    public function getSolictudesAnteriores($id) {
        $data['solicitudes'] = Persona::findOrNew($id)->solicitudes;
        return View::make('manejosolicitudes.solicitudesanteriores-lista', $data);
    }
    
    public function getCopiarDireccion($id) {
        $beneficiario = Persona::findOrFail($id);
        $data['beneficiario'] = $beneficiario;
        $data['solicitante'] = $beneficiario;
        return View::make('manejosolicitudes.direccion-solicitante', $data);
    }
}
