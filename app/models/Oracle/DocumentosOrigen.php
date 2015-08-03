<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Oracle;
/**
 * Description of DocumentosOrigen
 *
 * @author Reysmer Valle
 * @property-read mixed $estatus_display
 */
class DocumentosOrigen extends OracleBaseModel {
    
    protected $sequence = "sq_iddoc";
    
    protected $primaryKey = "iddoc";
    
    protected $fillable = [/*'iddoc',*/
        'descdoc',
        'origen',
        'numbenef',
        'refdoc',
        'mtodoc',
        'stsdoc',
        'fecdoc',
        'tipodoc',
        'ano',
        'usrsts',
        'fecsts',
        'indreverso',
        'mensaje',
        'numcomprom',
        'iddocref',
        'ccosto',
        'codproyint',
        'usrcre',
        'usrcod',
        'usrrec',
        'usrver',
        'iddocfis',
        'fecvencdoc',
        'sistfecvencdoc',
        'fecref',
        'codsisreg',
        'numop',
        'idpagoorigen',
        'iddocorigtransf',
        'iddoctransf',
        'descdocext',
        'codsitio',
        'codmoneda',
        'tasa',
        'montoorig',
        'mtodocant',
        'codmonedaant',
        'codmonedamtodoc',
        'codundorig',
        'codundadmorig',
        'codundadmpro',
        'numbenefaux',
        'idprocexonera',
        'porcentaje',
        'mtobaseded',
        'iddocexterno'];
    
    protected $table = "documentos_origen";
    
    protected $rules = [
        //'iddoc' => 'required|numeric|digits_between:1,14',
        'descdoc' => 'required',
        'origen' => 'required',
        'numbenef' => 'required|numeric|digits_between:1,8',
        'refdoc' => 'required',
        'mtodoc' => 'required',
        'stsdoc' => 'required',
        'fecdoc' => 'required|date',
        'tipodoc' => 'required',
        'ano' => 'required|numeric|digits_between:0,4',
        'usrsts' => 'required',
        'fecsts' => 'required|date',
        'indreverso' => 'required',
        'mensaje' => '',
        'numcomprom' => 'numeric|digits_between:0,14',
        'iddocref' => 'numeric|digits_between:0,14',
        'ccosto' => '',
        'codproyint' => '',
        'usrcre' => '',
        'usrcod' => '',
        'usrrec' => '',
        'usrver' => '',
        'iddocfis' => 'numeric|digits_between:0,14',
        'fecvencdoc' => 'date',
        'sistfecvencdoc' => '',
        'fecref' => 'date',
        'codsisreg' => '',
        'numop' => 'numeric|digits_between:0,15',
        'idpagoorigen' => 'numeric|digits_between:0,14',
        'iddocorigtransf' => 'numeric|digits_between:0,14',
        'iddoctransf' => 'numeric|digits_between:0,14',
        'descdocext' => '',
        'codsitio' => '',
        'codmoneda' => 'required',
        'tasa' => 'numeric|digits_between:0,10',
        'montoorig' => 'required',
        'mtodocant' => 'numeric',
        'codmonedaant' => '',
        'codmonedamtodoc' => 'required',
        'codundorig' => 'required',
        'codundadmorig' => 'required',
        'codundadmpro' => 'required',
        'numbenefaux' => 'numeric|digits_between:0,8',
        'idprocexonera' => 'numeric|digits_between:0,15',
        'porcentaje' => 'numeric|digits_between:1,5',
        'mtobaseded' => 'numeric',
        'iddocexterno' => 'numeric|digits_between:1,14'
    ];
    
    
    protected function getPrettyFields() {
        return array();
    }

    public function getPrettyName() {
        
    }

}
