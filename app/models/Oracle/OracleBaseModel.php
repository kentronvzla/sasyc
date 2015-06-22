<?php

namespace Oracle;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OracleBaseModel
 * Clase para manejar las sequencias en oracle y yajra.
 * @author Nadin Yamani
 */
abstract class OracleBaseModel extends \BaseModel {

    protected $sequence = "";
    public $timestamps = false;
    protected $connection = 'oracle';
    protected $usesequence = true;

    public function creatingModel($model) {
        unset($this->id);
        if($model->usesequence){
            $sequence = \DB::connection($this->connection)->getSequence();
            $model->{$model->primaryKey} = $sequence->nextValue($model->sequence);
        }
        return true;
    }

}
