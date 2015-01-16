<?php

class PresupuestosController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function postModificar() {
        $presupuesto = Presupuesto::findOrNew(Input::get('id'));
        $presupuesto->fill(Input::all());
        if ($presupuesto->save()) {
            $data['mensaje'] = 'Datos guardados correctamente';
            $data['vista'] = $this->getPresupuesto(Input::get('solicitud_id'), Input::get('id'))->render();
            return Response::json($data);
        }
        return Response::json(['errores' => $presupuesto->getErrors()], 400);
    }

    public function getPresupuesto($solicitud_id, $presupuesto_id = null) {
        $data['solicitud'] = Solicitud::findOrFail($solicitud_id);
        $data['presupuesto'] = Presupuesto::findOrNew($presupuesto_id);
        $data['presupuestos'] = $data['solicitud']->presupuestos;
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
