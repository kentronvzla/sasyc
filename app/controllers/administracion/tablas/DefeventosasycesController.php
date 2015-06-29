<?php namespace Administracion\Tablas;

/**
 * Description of DefeventosasycesController
 *
 * @author Nadin Yamani
 */
class DefeventosasycesController extends \Administracion\TablasBaseController {
    
    public function __construct() {
        parent::__construct();
    }
    
   public function getTipoEventos($tipodoc) {
        $eventos = \Oracle\TipoEvento::getCombo($tipodoc);
        return \Response::json($eventos);
    }

       public function tipoevento() {
        return $this->belongsTo('\oracle\TipoEvento');
    }

}