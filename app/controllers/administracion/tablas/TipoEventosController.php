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

   protected static $eagerLoading = ['defeventosasyc'];

    public function getIndex() {
        $data['tipoeventos'] = \Oracle\TipoEvento::all();
        $ruta = \Route::getCurrentRoute();
        $data['url'] = url($ruta->getPath());
        return \View::make('administracion.tablas.tipoEventos', $data);
    }

    public function getModifica($tipo_doc, $tipo_evento, $id= 0) {
        $tipoeven = \Defeventosasyc::whereTipoDoc($tipo_doc)->whereTipoEvento($tipo_evento)->get();

        if (!$tipoeven->isEmpty()) {
         
        $data['defeventosasyc']= \Defeventosasyc::findorNew($id)->whereTipoDoc($tipo_doc)->whereTipoEvento($tipo_evento)->get();;

       return \View::make('administracion.tablas.tipoEventosform', $data);
           
        }else{ 
           $data['defeventosasyc'] = \Defeventosasyc::Create(array('tipo_doc' => $tipo_doc, 'tipo_evento'=>$tipo_evento));

           return \View::make('administracion.tablas.defeventosasycesform', $data);
        }

            
    }
 
 
}