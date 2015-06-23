<?php namespace Administracion\Tablas;

/**
 * Description of DefeventosasycesController
 *
 * @author Nadin Yamani
 */
class TipoEventosController extends \Administracion\TablasBaseController {
    
     public function __construct() {
        parent::__construct();
    }
    
      public function getIndex(){
       $data['tipoeventos'] = \TipoEvento::paginate(5);
        return View::make('administracion.defeventosasyces',$data);
    }

}