<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Oracle;

/**
 * Oracle\Catalogo
 *
 * @property-read mixed $estatus_display 
 */
class Catalogo extends OracleBaseModel {

    protected $primaryKey = null;
    public $incrementing = false;
    protected $sequence = null;
    protected $usesequence = false;
    protected $fillable = ['codigo', 'coditem', 'codserv', 'codant', 'codnombre', 'refitem', 'sisitem',
        'tipoitem', 'codguia', 'obsitem', 'usuing', 'fecing', 'unidbasica', 'usumod', 'fecmod', 'cantidaddub',
        'coditemtrf', 'codclasif', 'descripcion', 'tiposumin', 'idgenerico', 'descondicional',
        'codctaprepup', 'nivelsum', 'idoc', 'numbenef', 'feultcom', 'ultprecio', 'cantcomp', 'codcatg',
        'codq1', 'numpublicacion', 'codctacont', 'anoeje', 'codmoneda', 'codclasifsnc', 'valor',
        'indloteserializado', 'indobra'];
    protected $table = "v_catalogo";
    protected $rules = [
        'codigo' => '',
        'coditem' => '',
        'codserv' => '',
        'codant' => '',
        'refitem' => '',
        'sisitem' => '',
        'tipoitem' => '',
        'obsitem' => '',
        'usuing' => '',
        'fecing' => '',
        'unidbasica' => '',
        'usumod' => '',
        'fecmod' => '',
        'cantidaddub' => '',
        'coditemtrf' => '',
        'codclasif' => '',
        'descripcion' => '',
        'tiposumin' => '',
        'idgenerico' => '',
        'descondicional' => '',
        'codctaprepup' => '',
        'nivelsum' => '',
        'idoc' => '',
        'numbenef' => '',
        'feultcom' => '',
        'ultprecio' => '',
        'cantcomp' => '',
        'codcatg' => '',
        'codq1' => '',
        'numpublicacion' => '',
        'codctacont' => '',
        'anoeje' => '',
        'codmoneda' => '',
        'codclasifsnc' => '',
        'valor' => '',
        'indloteserializado' => '',
        'indobra' => '',
    ];

    protected function getPrettyFields() {
        return array();
    }

    public function getPrettyName() {
        return [
            'codigo' => 'Codigo',
            'desrpcion' => 'Descripción',
        ];
    }
    
     public static function getCombos(array $condiciones = []) {
        $catalogos = Catalogo::all();
        $retorno = array('' => 'Seleccione');
        if (is_object($catalogos)) {
            foreach ($catalogos as $registro) {
                $retorno[$registro->codigo] = $registro->codigo." - ".$registro->descripcion;
            }
        }
        return $retorno;
    }

}
