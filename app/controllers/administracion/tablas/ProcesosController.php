<?php namespace Administracion\Tablas;

/**
 * Description of ProcesosController
 *
 * @author Nadin Yamani
 */
class ProcesosController extends \Administracion\TablasBaseController {

    public function getProceso($id){
        return \Response::json(\Proceso::findOrFail($id));
    }
    
     
    
}