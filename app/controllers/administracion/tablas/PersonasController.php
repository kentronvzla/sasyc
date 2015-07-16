<?php namespace Administracion\Tablas;

class PersonasController extends \Administracion\TablasBaseController {

     public function __construct() {
        parent::__construct();
    }
    
    public function getIndex() {
        $data['personas'] = \Persona::paginate(5);
        return \View::make('administracion.tablas.personas', $data);
    }
    
     public function getModifica($id) {
        $data['persona'] = \Persona::findOrFail($id);
        return \View::make('administracion.tablas.personasform', $data);
    }
  
}