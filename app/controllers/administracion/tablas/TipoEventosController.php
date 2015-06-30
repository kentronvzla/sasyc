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

    public function getModifica($tipo_doc, $tipo_evento) {
//        dump($tipo_doc);
//        dump($tipo_evento);
//exit();
       
        
        $tipoeven = \Defeventosasyc::whereTipoDoc($tipo_doc)->whereTipoEvento($tipo_evento)->get();

        if (!$tipoeven->isEmpty()) {
         
        $data['tipoeventos']= $tipoeven;

       return \View::make('administracion.tablas.tipoEventosform', $data);
           
        }else{ 
            
           $data['tipoeventos'] = \Defeventosasyc::create(array('tipo_doc' => $tipo_doc, 'tipo_evento'=>$tipo_evento));
              dump($data);
            return \View::make('administracion.tablas.creardocumento', $data);
        }

            
    }
 
public function insertUser() {
	$tipo_doc = e(Input::get('tipo_doc')); 
	$tipo_evento = e(Input::get('tipo_evento'));
	DB::insert('INSERT INTO defeventosasyc (`tipo_doc`,`tipo_evento`) VALUES (?,?)', array($tipo_doc, $tipo_evento));
	return $this->showUsers();
} 
}