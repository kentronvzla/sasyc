<?php

/**
 * Description of ClaseRequerimientoRequerimiento
 *
 * @author Nadin Yamani
 */
class ClaseRequerimientoRequerimiento extends BaseModel {

    protected $table = "clase_requerimiento_requerimiento";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'requerimiento_id', 'clase_requerimiento_id', 'ind_cantidad', 'ind_monto', 'ind_beneficiario',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save,
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'requerimiento_id'=>'required|integer',
        'clase_requerimiento_id'=>'required|integer',
        'ind_cantidad'=>'required',
        'ind_monto'=>'required',
        'ind_beneficiario'=>'required',
    ];

    protected function getPrettyFields() {
        return [
            'requerimiento_id'=>'Requerimiento',
            'clase_requerimiento_id'=>'Clase del requerimiento',
            'ind_cantidad'=>'¿Cantidad Obligatoria?',
            'ind_monto'=>'¿Monto Obligatorio?',
            'ind_beneficiario'=>'¿Beneficiario Obligatorio?',
        ];
    }

    public function getPrettyName() {
        return "Requerimiento y Clase";
    }

    /**
     * Define una relación pertenece a Requerimiento
     * @return Requerimiento
     */
    public function requerimiento(){
        return $this->belongsTo('Requerimiento');
    }
    /**
     * Define una relación pertenece a ClaseRequerimiento
     * @return ClaseRequerimiento
     */
    public function claseRequerimiento(){
        return $this->belongsTo('ClaseRequerimiento');
    }

    public function getTableFields(){
        return ['requerimiento->nombre','claseRequerimiento->nombre','ind_cantidad','ind_monto','ind_beneficiario'];
    }


}
