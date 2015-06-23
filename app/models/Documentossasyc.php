<?php 

/**
 * Description of Documentossasyc
 *
 * @author Nadin Yamani
 */
class Documentossasyc extends BaseModel {

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
        'documento_id'=>'required|integer', 
'tipo_doc'=>'required', 
'tipo_evento'=>'required', 
'descripcion'=>'required', 
'fecha'=>'required', 
'estatus'=>'required', 
'solicitud'=>'required|integer', 
'ref_doc'=>'', 
'num_op'=>'integer', 
'mensaje'=>'', 
'id_doc_ref'=>'integer', 
'ind_aprueba_auto'=>'required', 
'ind_doc_ext'=>'required', 
'ind_ctas_adic'=>'required', 
'ind_reng_adic'=>'required', 
'ind_detcomp_adic'=>'required', 
'version'=>'required|integer', 

    ];
    
    protected function getPrettyFields() {
        return [
            'documento_id'=>'documento_id', 
'tipo_doc'=>'tipo_doc', 
'tipo_evento'=>'tipo_evento', 
'descripcion'=>'descripcion', 
'fecha'=>'fecha', 
'estatus'=>'estatus', 
'solicitud'=>'solicitud', 
'ref_doc'=>'ref_doc', 
'num_op'=>'num_op', 
'mensaje'=>'mensaje', 
'id_doc_ref'=>'id_doc_ref', 
'ind_aprueba_auto'=>'ind_aprueba_auto', 
'ind_doc_ext'=>'ind_doc_ext', 
'ind_ctas_adic'=>'ind_ctas_adic', 
'ind_reng_adic'=>'ind_reng_adic', 
'ind_detcomp_adic'=>'ind_detcomp_adic', 
'version'=>'version', 

        ];
    }

    public function getPrettyName() {
        return "documentossasyc";
    }

    /**
* Define una relación pertenece a Documento
* @return Documento
*/
public function documento(){
    return $this->belongsTo('Documento');
}


}
