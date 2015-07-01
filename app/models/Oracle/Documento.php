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
 * @property integer $BENEFICIARIO_ID 
 * @property string $CCOSTO 
 * @property string $COD_ACC_INT 
 * @property string $DEPENDENCIA 
 * @property string $DESCRIPCION 
 * @property string $ESTATUS 
 * @property string $FECHA 
 * @property integer $ID 
 * @property integer $ID_DOC 
 * @property string $IND_REVERSO 
 * @property string $MENSAJE 
 * @property string $MONEDA 
 * @property float $MONTO 
 * @property string $REFERENCIA 
 * @property integer $SOLICITUD_ID 
 * @property string $TIPO_DOC 
 * @property integer $VERSION 
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereBENEFICIARIOID($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereCCOSTO($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereCODACCINT($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereDEPENDENCIA($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereDESCRIPCION($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereESTATUS($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereFECHA($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereID($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereIDDOC($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereINDREVERSO($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereMENSAJE($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereMONEDA($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereMONTO($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereREFERENCIA($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereSOLICITUDID($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereTIPODOC($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereVERSION($value)
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
