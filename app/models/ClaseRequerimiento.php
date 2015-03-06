<?php

/**
 * Description of ClaseRequerimiento
 *
 * @author Nadin Yamani
 */
class ClaseRequerimiento extends BaseModel {

    protected $table = "clase_requerimiento";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'tipo_doc',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save,
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre'=>'required',
        'tipo_doc'=>'required|max:5',
    ];

    protected function getPrettyFields() {
        return [
            'nombre'=>'Clase de requerimiento',
            'tipo_doc'=>'Tipo de documento',
        ];
    }

    public function getPrettyName() {
        return "Clase de requerimiento";
    }
}
