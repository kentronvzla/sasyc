<?php

/**
 * Description of Departamento
 *
 * @author Nadin Yamani
 */
class Departamento extends BaseModel implements SimpleTableInterface {

    protected $table = "departamentos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'supervisor_id', 'nombre',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'supervisor_id' => 'required|integer',
        'nombre' => 'required|max:100',
    ];

    protected function getPrettyFields() {
        return [
            'supervisor_id' => 'Supervisor',
            'nombre' => 'Nombre',
        ];
    }

    public function getPrettyName() {
        return "departamento";
    }

    /**
     * Define una relación pertenece a Usuario
     * @return Usuario
     */
    public function supervisor() {
        return $this->belongsTo('Usuario');
    }

    public function getTableFields() {
        return [
            'supervisor->nombre', 'nombre'
        ];
    }

}
