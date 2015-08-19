<?php

/**
 * Description of Defeventosasyc
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $tipo_doc
 * @property string $tipo_evento
 * @property boolean $ind_aprueba_auto
 * @property boolean $ind_doc_ext
 * @property boolean $ind_ctas_adic
 * @property boolean $ind_reng_adic
 * @property boolean $ind_detcomp_adic
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereTipoDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereTipoEvento($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereIndApruebaAuto($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereIndDocExt($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereIndCtasAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereIndRengAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereIndDetcompAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereUpdatedAt($value)
 */
class Defeventosasyc extends BaseModel implements SimpleTableInterface {

    use \Traits\EloquentExtensionTrait;

    protected $table = "defeventosasyc";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'tipo_doc', 'tipo_evento', 'ind_aprueba_auto', 'ind_doc_ext', 'ind_ctas_adic', 'ind_reng_adic', 'ind_detcomp_adic', 'version',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected function getPrettyFields() {
        return [

            'tipo_doc' => 'Tipo Documento',
            'tipo_evento' => 'Tipo Evento',
            'ind_aprueba_auto' => 'Aprobacion Automatica?',
            'ind_doc_ext' => 'Documento Externo?',
            'ind_ctas_adic' => 'Cuentas Adicionales?',
            'ind_reng_adic' => 'Renglones de Solicitud?',
            'ind_detcomp_adic' => 'Detalle de comprobante de pago?',
        ];
    }

    public function getPrettyName() {
        return "defeventosasyc";
    }

    public function isValid($data) {
        $rules = [
            'ind_aprueba_auto' => 'required',
            'ind_ctas_adic' => 'required',
            'ind_reng_adic' => 'required',
            'ind_detcomp_adic' => 'required',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }

    public static function getCombos() {
        $def_evtsasyc = Defeventosasyc::all();
        $retorno = array('' => 'Seleccione');
        if (is_object($def_evtsasyc)) {
            foreach ($def_evtsasyc as $registro) {
                $descripciones = \Oracle\TipoEvento::select('desctipodoc')
                                ->where('tipodoc', '=', $registro->tipo_doc)->get();
                foreach ($descripciones as $descripcion) {
                    $retorno[$registro->id] = $registro->tipo_doc . " - " . $descripcion->desctipodoc;
                }
            }
        }
        return $retorno;
    }

}
