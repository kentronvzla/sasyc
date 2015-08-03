<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Oracle;

/**
 * Description of ComprobDetAdic
 *
 * @author Reysmer Valle
 * @property-read mixed $estatus_display
 */
class ComprobDetAdic extends OracleBaseModel {
    
    protected $primaryKey = null;
    public $incrementing = false;
    protected $sequence = null;
    protected $usesequence = false;
    
    protected $fillable = ['iddoc','codcta','mtoneto', 'porcimpto', 'indimptoman', 'mtoimpuesto', 'mtototal'];
    
    protected $table = "det_comprob_adic";
    
    protected $rules = [
        'iddoc' => "numeric|digits_between:0,14",
        'codcta' => "numeric",
        'mtoneto' => 'required', //array('required','regex:/^[0-9]{1,14}((\.|\,)\d{2}+)?$/'),
        'porcimpto' => 'required|numeric|digits_between:1,5',
        'indimptoman' => 'required',
        'mtoimpuesto' => 'required', //array('required','regex:/^[0-9]{1,14}((\.|\,)\d{2}+)?$/'),
        'mtototal' => 'required', //array('required','regex:/^[0-9]{1,14}((\.|\,)\d{2}+)?$/'),  
    ];
    
    protected function getPrettyFields() {
        return array();
    }

    public function getPrettyName() {
        
    }

}
