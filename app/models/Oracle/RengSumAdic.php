<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Oracle;

/**
 * Description of RengSumAdic
 *
 * @author Reysmer Valle
 * @property-read mixed $id
 * @property-read mixed $estatus_display
 */
class RengSumAdic extends OracleBaseModel {

    protected $primaryKey = null;
    public $incrementing = false;
    protected $sequence = null;
    protected $usesequence = false;
    protected $fillable = [
        'iddoc',
        'tiporeng',
        'coditem',
        'codserv',
        'descreng',
        'descadiitem',
        'unidbasica',
        'cantsol',
        'precio',
        'porcimptos'
    ];
    protected $table = "reng_sum_adic";

    protected $rules = [
        "iddoc" => "required|numeric|digits_between:0,14",
        "tiporeng" => "required",
        'coditem' => '',
        'codserv' => '',
        'descreng' => '',
        'descadiitem' => '',
        'unidbasica' => '',
        "cantsol" => "numeric|digits_between:1,14",
        "precio" => 'numeric', //array('numeric','regex:/^[0-9]{1,14}((\.|\,)\d{2}+)?$/'),
        "porcimptos" => "numeric|digits_between:2,14"
    ];

    protected function getPrettyFields() {
        return array();
    }

    public function getPrettyName() {
        
    }

}
