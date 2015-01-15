<?php

class PersonasController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function getBuscar() {
        $persona = Persona::findOrNewByCedula(Input::get('tipo_nacionalidad_id'), Input::get('ci'));
        $data['persona'] = $persona;
        $data['vista'] = $this->getFamiliaresSolicitante($persona->id)->render();
        return Response::json($data);
    }

    public function getBuscarAsociados() {
        $familiaPersonas = FamiliaPersona::wherePersonaBeneficiarioId(Input::get('tipo_nacionalidad_id'), Input::get('ci'));
        return Response::json(['familiaPersonas' => $familiaPersonas]);
    }

    public function postCrear($beneficiario_asoc = null, $render=true) {
        $persona = Persona::findOrNewByCedula(Input::get('tipo_nacionalidad_id'), Input::get('ci'));
        $persona->fill(Input::all());
        if ($persona->save()) {
            $data['persona'] = $persona;
            $data['mensaje'] = 'Datos guardados correctamente';
            if (!is_null($beneficiario_asoc)) {
                $benef = Persona::findOrFail($beneficiario_asoc);
                $benef->familiares()->attach($persona->id, array('parentesco_id' => Input::get('parentesco_id')));
                if($render===true){
                    $data['vista'] = $this->getFamiliaresBeneficiario($beneficiario_asoc)->render();
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

    public function getFamiliaresBeneficiario($id, $familiar_id = null) {
        $data['beneficiario'] = Persona::findOrFail($id);
        $data['familiar'] = Persona::findOrNew($familiar_id);
        $data['familiares'] = $data['beneficiario']->familiaresBeneficiario;
        return View::make('manejosolicitudes.grupofamiliar', $data);
    }
    
    public function getFamiliaressolicitante($id) {
        $data['familiares'] = Persona::findOrNew($id)->familiaresSolicitante;
        return View::make('manejosolicitudes.relacionados-lista', $data);
    }
}
