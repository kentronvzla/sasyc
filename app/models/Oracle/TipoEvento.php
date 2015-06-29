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
 * @property string $CODRUTA 
 * @property string $DESCTIPODOC 
 * @property string $INDREFDOC 
 * @property string $TIPODOC 
 * @property string $TIPODOCREF 
 * @property string $TIPOEVENTO 
 * @property-read \Illuminate\Database\Eloquent\Collection|\Defeventosasyc[] $defeventosasyc 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereCODRUTA($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereDESCTIPODOC($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereINDREFDOC($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereTIPODOC($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereTIPODOCREF($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereTIPOEVENTO($value)
 */
class TipoEvento extends OracleBaseModel {

    protected $primaryKey = null;
    public $incrementing = false;
    protected $sequence = null;
    protected $usesequence = false;

    protected $fillable = ['tipodoc', 'destipodoc', 'codruta', 'tipodoccref', 'indrefdoc', 'tipoevento'];
    protected $table = "v_eventosasyc";
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
        return [
            'tipodoc' => 'Tipo de documento',
            'destipodoc' => 'Descripción',
            'codruta' => 'Ruta',
            'tipodoccref' => '',
            'indrefdoc' => '',
            'tipoevento' => 'Tipo de evento'
        ];
    }

    public function defeventosasyc() {
        return $this->hasMany('Defeventosasyc');
    }
}
