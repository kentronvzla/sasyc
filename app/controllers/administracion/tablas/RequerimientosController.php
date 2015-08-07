<?php

namespace Administracion\Tablas;

/**
 * Description of RequerimientosController
 *
 * @author Nadin Yamani
 */
class RequerimientosController extends \Administracion\TablasBaseController {

    protected static $eagerLoading = ['tipoAyuda', 'tipoRequerimiento'];

    public function afterPostIndex($variable){
        $variable->procesos()->sync(\Input::get('procesos', []));
        
    }
    
    public function getProcesos($id) {
        $procesos = \Proceso::getCombos($id);
        return \Response::json($procesos);
    }
}
