<?php

/**
 * Description of Departamento
 *
 * @author Nadin Yamani
 * @property integer $id 
 * @property integer $supervisor_id 
 * @property string $nombre 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Usuario $supervisor 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\Departamento whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Departamento whereSupervisorId($value)
 * @method static \Illuminate\Database\Query\Builder|\Departamento whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Departamento whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Departamento whereUpdatedAt($value)
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
