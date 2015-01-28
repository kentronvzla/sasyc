<?php namespace Oracle;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Beneficiario
 *
 * @author Richard Arrieta
 */
class Beneficiario  extends OracleBaseModel implements \SelectInterface{

    protected $table = "beneficiarios";
    
    public function presupuestos(){
        return $this->hasMany('Presupuesto');
    }

    public static function getCampoCombo() {
        return 'nombre';
    }

    protected function getPrettyFields() {
        
    }

    public function getPrettyName() {
        
    }
    
    public function getIdAttribute(){
        return $this->numbenef;
    }

}
