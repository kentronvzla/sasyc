<?php

namespace Administracion\Tablas;

/**
 * Description of TipoEventosControllerController
 *
 * @author Nadin Yamani
 */
class TipoEventosController extends \Administracion\TablasBaseController {

    public function __construct() {
        parent::__construct();
    }

//    protected static $eagerLoading = ['defeventosasyces'];

    public function getIndex() {
        $data['tipoeventos'] = \Oracle\TipoEvento::all();
        $ruta = \Route::getCurrentRoute();
        $data['url'] = url($ruta->getPath());
        return \View::make('administracion.tablas.tipoEventos', $data);
    }

    public function getModifica($tipo_doc, $tipo_evento) {
        
        $tipoeven = \Defeventosasyc::whereTipoDoc($tipo_doc)->whereTipoEvento($tipo_evento)->get();

        if (!$tipoeven->isEmpty()) {
         
        $data['tipoeventos']= $tipoeven;

       return \View::make('administracion.tablas.tipoEventosform', $data);
           
        }else{ 
            return \Response::json(['mensaje' => 'Este Documento no esta Configurado']);
        }

        
    }
        public function getnuevo() {
        $data['nuevo'] = true;
        $data['tipodocumento'] = new \Defeventosasyc();
        return \View::make('administracion.tablas.tipoEventosform', $data);
}
}