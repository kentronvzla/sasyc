<?php

class BitacorasController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function postModificar() {
        $bitacora = Bitacora::findOrNew(Input::get('id'));
        $bitacora->fill(Input::all());
        if ($bitacora->save()) {
            $data['mensaje'] = 'Datos guardados correctamente';
            $data['vista'] = $this->getBitacora(Input::get('solicitud_id'), Input::get('id'))->render();
            return Response::json($data);
        }
        return Response::json(['errores' => $bitacora->getErrors()], 400);
    }

    public function getBitacora($solicitud_id, $bitacora_id = null) {
        $data['solicitud'] = Solicitud::findOrFail($solicitud_id);
        $data['bitacora'] = Bitacora::findOrNew($bitacora_id);
        $data['bitacoras'] = $data['solicitud']->bitacoras;
        return View::make('solicitudes.bitacora', $data);
    }

    public function getAtendida($bitacora_id){
        $data['bitacora'] = Bitacora::findOrFail($bitacora_id);
        $data['bitacora']->atendida();
        $data['solicitud'] = $data['bitacora']->solicitud;
        $data['bitacoras'] = $data['solicitud']->bitacoras;
        
        return View::make('solicitudes.bitacora', $data);
    }
    
      
}