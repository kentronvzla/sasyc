<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Oracle;
/**
 * Description of TipoEvento
 *
 * @author Dhaily Robles
 */
class TipoEvento extends OracleBaseModel {
    
//    protected $primaryKey = null;
//    public $incrementing = false;
//    protected $sequence = null;
//    protected $usesequence = false;
    
    protected $fillable = ['tipodoc','destipodoc','codruta', 'tipodoccref', 'indrefdoc', 'tipoevento'];
    
    protected $table = "V_EVENTOSASYC";
    
    protected $rules = [
        'tipodoc' => '',
        'destipodoc' => '',
        'codruta' => '',
        'tipodoccref' => '',
        'indrefdoc' => '',
        'tipoevento' => '',  
    ];
    
    protected function getPrettyFields() {
        return array();
    }

    public function getPrettyName() {
        
    }
//    public function tipoevento() {
//        return $this->hasMany('Defeventosasyc');
//    }

}

