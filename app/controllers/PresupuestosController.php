<?php

class PresupuestosController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function postModificar() {
        $presupuesto = Presupuesto::findOrNew(Input::get('id'));
        $presupuesto->fill(Input::all());
        if (Input::get('ind_creando_benef') == 1) {
            $beneficiario = Oracle\Beneficiario::create(Input::all());
            if ($beneficiario->hasErrors()) {
                return Response::json(['errores' => $beneficiario->getErrors()], 400);
            }
            $presupuesto->beneficiario_id = $beneficiario->NUMBENEF;
        }
        if ($presupuesto->save()) {
            $data['mensaje'] = 'Datos guardados correctamente';
            $data['vista'] = $this->getPresupuesto(Input::get('solicitud_id'), null)->render();
            return Response::json($data);
        }
        //por si se creo el beneficiario que lo borre...
        DB::connection('oracle')->rollback();
        return Response::json(['errores' => $presupuesto->getErrors()], 400);
    }

    public function getPresupuesto($solicitud_id, $presupuesto_id = null) {
        $data['solicitud'] = Solicitud::findOrFail($solicitud_id);
        $data['presupuesto'] = Presupuesto::findOrNew($presupuesto_id);
        $data['presupuestos'] = $data['solicitud']->presupuestos;
        $data['beneficiario_kerux'] = new Oracle\Beneficiario();
        return View::make('manejosolicitudes.presupuesto', $data);
    }

    public function deletePresupuesto($id) {
        $presupuesto = Presupuesto::findOrFail(Input::get('id'));
        $presupuesto->delete();
        $data['mensaje'] = "Se eliminó el presupuesto correctamente";
        $data['vista'] = $this->getPresupuesto($id)->render();
        return Response::json($data);
    }

}
