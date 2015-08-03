<?php

/**
 * Description of Documentossasyc
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $documento_id
 * @property string $tipo_doc
 * @property string $tipo_evento
 * @property string $descripcion
 * @property string $fecha
 * @property string $estatus
 * @property integer $solicitud
 * @property string $ref_doc
 * @property integer $num_op
 * @property string $mensaje
 * @property integer $id_doc_ref
 * @property boolean $ind_aprueba_auto
 * @property boolean $ind_doc_ext
 * @property boolean $ind_ctas_adic
 * @property boolean $ind_reng_adic
 * @property boolean $ind_detcomp_adic
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Documento $documento
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereDocumentoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereTipoDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereTipoEvento($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereFecha($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereEstatus($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereSolicitud($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereRefDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereNumOp($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereMensaje($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIdDocRef($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIndApruebaAuto($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIndDocExt($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIndCtasAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIndRengAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIndDetcompAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereUpdatedAt($value)
 */
class Documentossasyc extends BaseModel {

    protected $primaryKey = "id";
    
    protected $table = "documentossasyc";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'documento_id', 'tipo_doc', 'tipo_evento', 'descripcion', 'fecha', 'estatus', 'solicitud', 'ref_doc', 'num_op', 'mensaje', 'id_doc_ref', 'ind_aprueba_auto', 'ind_doc_ext', 'ind_ctas_adic', 'ind_reng_adic', 'ind_detcomp_adic', 'version',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'documento_id' => 'required|integer',
        'tipo_doc' => 'required',
        'tipo_evento' => 'required',
        'descripcion' => 'required',
        'fecha' => 'required',
        'estatus' => 'required',
        'solicitud' => 'required|integer',
        'ref_doc' => '',
        'num_op' => 'integer',
        'mensaje' => '',
        'id_doc_ref' => 'integer',
        'ind_aprueba_auto' => 'required',
        'ind_doc_ext' => 'required',
        'ind_ctas_adic' => 'required',
        'ind_reng_adic' => 'required',
        'ind_detcomp_adic' => 'required',
        'version' => 'required|integer',
    ];

    protected function getPrettyFields() {
        return [
            'documento_id' => 'documento_id',
            'tipo_doc' => 'tipo_doc',
            'tipo_evento' => 'tipo_evento',
            'descripcion' => 'descripcion',
            'fecha' => 'fecha',
            'estatus' => 'estatus',
            'solicitud' => 'solicitud',
            'ref_doc' => 'ref_doc',
            'num_op' => 'num_op',
            'mensaje' => 'mensaje',
            'id_doc_ref' => 'id_doc_ref',
            'ind_aprueba_auto' => 'ind_aprueba_auto',
            'ind_doc_ext' => 'ind_doc_ext',
            'ind_ctas_adic' => 'ind_ctas_adic',
            'ind_reng_adic' => 'ind_reng_adic',
            'ind_detcomp_adic' => 'ind_detcomp_adic',
            'version' => 'version',
        ];
    }

    public function getPrettyName() {
        return "documentossasyc";
    }

    /**
     * Define una relación pertenece a Documento
     * @return Documento
     */
    public function documento() {
        return $this->belongsTo('Documento');
    }

}
