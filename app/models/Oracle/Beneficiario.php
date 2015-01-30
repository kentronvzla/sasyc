<?php

namespace Oracle;

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
class Beneficiario extends OracleBaseModel implements \SelectInterface {

    protected $sequence = "SQ_NUMBENEF";
    protected $primaryKey = "NUMBENEF";
    protected $fillable = ['NOMBRE', 'APPABREV', 'TIPOBENEF', 'LETRAID', 'NUMID', 'CLASE'];
    protected $table = "beneficiarios";
    protected $rules = [
        'NOMBRE' => 'required',
        'APPABREV' => 'required',
        'TIPOBENEF' => 'required',
        'LETRAID' => 'required',
        'NUMID' => 'required|between:0,12',
        'CLASE' => 'required',
    ];
    public static $tipoBenef = [
        'P' => 'Público',
        'N' => 'Natural',
        'J' => 'Jurídico',
        'E' => 'Extranjero',
    ];
    public static $clase = [
        'A' => 'A',
        'B' => 'B',
        'C' => 'C',
        'F' => 'F',
        'I' => 'I',
        'J' => 'J',
        'O' => 'O',
        'S' => 'S',
        'T' => 'T',
        'X' => 'X',
        'Y' => 'Y',
    ];

    public function presupuestos() {
        return $this->hasMany('Presupuesto');
    }

    public static function getCampoCombo() {
        return 'nombre';
    }

    protected function getPrettyFields() {
        return [
            'NOMBRE' => 'Nombre del beneficiario',
            'APPABREV' => 'Apellido abreviado',
            'TIPOBENEF' => 'Tipo de beneficiario',
            'LETRAID' => 'Tipo Identificacion',
            'NUMID' => 'Cédula o RIF',
            'CLASE' => 'Clase del beneficiario',
        ];
    }

    public function getPrettyName() {
        return "beneficiarios";
    }

    public function getIdAttribute() {
        return $this->numbenef;
    }

    public function validate($model = null) {
        if (parent::validate($model)) {
            $check = static::where('LETRAID', '=', $this->LETRAID)->where('NUMID', '=', $this->NUMID);
            if (isset($this->NUMBENEF)) {
                $check->where('NUMBENEF', '<>', $this->NUMBENEF);
            }
            if ($check->count() > 0) {
                $this->addError('NUMID', 'Este beneficiario ya existe.');
            }
        }
        return !$this->hasErrors();
    }

}
