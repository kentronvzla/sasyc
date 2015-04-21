<?php

class AutocompletarController extends BaseController {

    public function getSolicitudes(){
        $solicitudes = Solicitud::where('referencia_externa','ILIKE', Input::get('query'))->get();
        return Response::json($solicitudes->lists('referencia_externa'));
    }
}
