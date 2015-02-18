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
class Documento extends OracleBaseModel {

    protected $table = "documentos";

    public function getPrettyFields(){
        return [
            'estatus'=>'Estatus'
        ];
    }

    public function getPrettyName(){
        return "Documento";
    }

}
