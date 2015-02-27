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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Presupuesto[] $presupuestos 
 * @property-read mixed $id 
 * @property-read mixed $estatus_display 
 */
class Beneficiario extends OracleBaseModel implements \SelectInterface {

    protected $sequence = "SQ_NUMBENEF";
    protected $primaryKey = "numbenef";
    protected $fillable = ['nombre', 'appabrev', 'tipobenef', 'letraid', 'numid', 'clase'];
    protected $table = "beneficiarios";
    protected $rules = [
        'nombre' => 'required',
        'appabrev' => 'required',
        'tipobenef' => 'required',
        'letraid' => 'required',
        'numid' => 'required|between:0,12',
        'clase' => 'required',
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
            'nombre' => 'Nombre del beneficiario',
            'appabrev' => 'Apellido abreviado',
            'tipobenef' => 'Tipo de beneficiario',
            'letraid' => 'Tipo Identificacion',
            'numid' => 'Cédula o RIF',
            'clase' => 'Clase del beneficiario',
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
            $check = static::where('letraid', '=', $this->letraid)->where('numid', '=', $this->numid);
            if (isset($this->numbenef)) {
                $check->where('numbenef', '<>', $this->numbenef);
            }
            if ($check->count() > 0) {
                $this->addError('numid', 'Este beneficiario ya existe.');
            }
        }
        return !$this->hasErrors();
    }

}
