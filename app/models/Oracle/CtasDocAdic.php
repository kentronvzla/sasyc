<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Oracle;
/**
 * Description of CtasDocAdic
 *
 * @author Reysmer Valle
 * @property-read mixed $estatus_display 
 */
class CtasDocAdic extends OracleBaseModel {
    
    protected $primaryKey = null;
    public $incrementing = false;
    protected $sequence = null;
    protected $usesequence = false;
    
    protected $fillable = ['iddoc','codaccint','ccosto', 'codcta', 'codprograma', 'monto', 'registro'];
    
    protected $table = "ctas_doc_adic";
    
    protected $rules = [
        'iddoc' => 'numeric|digits_between:0,14',
        'codaccint' => '',
        'ccosto' => '',
        'codcta' => 'numeric',
        'codprograma' => '',
        'monto' => '',
        'registro' => ''
    ];
    
    protected function getPrettyFields() {
        return array();
    }

    public function getPrettyName() {
        
    }

}
