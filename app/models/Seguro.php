<?php

/**
 * Description of Seguro
 *
 * @author Dhaily Robles
 * @property integer $id 
 * @property string $nombre 
 * @property integer $version 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\Seguro whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Seguro whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Seguro whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Seguro whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Seguro whereUpdatedAt($value)
 */
class Seguro extends BaseModel {

    protected $table = "seguros";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
        ];
    }

    public function getPrettyName() {
        return "seguros";
    }

     public static function getCombos(array $condiciones = []) {
        $seguros = Seguro::all();
        $retorno = array('' => 'Seleccione');
        if (is_object($seguros)) {
            foreach ($seguros as $seguro) {
                $retorno[$seguro->id] = $seguro->nombre;
            }
        }
        return $retorno;
    }

}
