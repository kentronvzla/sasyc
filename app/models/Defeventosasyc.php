<?php 

/**
 * Description of Defeventosasyc
 *
 * @author Nadin Yamani
 */
class Defeventosasyc extends BaseModel implements SimpleTableInterface  {

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
    protected $rules = [
        'tipo_doc'=>'required', 
'tipo_evento'=>'required', 
'ind_aprueba_auto'=>'required', 
'ind_doc_ext'=>'required', 
'ind_ctas_adic'=>'required', 
'ind_reng_adic'=>'required', 
'ind_detcomp_adic'=>'required', 
'version'=>'required|integer', 

    ];
    
    protected function getPrettyFields() {
        return [
            'tipo_doc'=>'tipo_doc', 
'tipo_evento'=>'tipo_evento', 
'ind_aprueba_auto'=>'ind_aprueba_auto', 
'ind_doc_ext'=>'ind_doc_ext', 
'ind_ctas_adic'=>'ind_ctas_adic', 
'ind_reng_adic'=>'ind_reng_adic', 
'ind_detcomp_adic'=>'ind_detcomp_adic', 
'version'=>'version', 

        ];
    }

    public function getPrettyName() {
        return "defeventosasyc";
    }

    

}
