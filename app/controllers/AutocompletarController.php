<?php

class AutocompletarController extends BaseController {

    public function getSolicitudes(){
        $solicitudes = Solicitud::where('referente_externo','ILIKE', Input::get('query'))->get();
        return Response::json($solicitudes->lists('referente_externo'));
    }
}
