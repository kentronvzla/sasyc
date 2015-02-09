<?php

/**
 * Configuracion
 *
 * @property integer $id
 * @property string $variable
 * @property string $valor
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Configuracion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Configuracion whereVariable($value)
 * @method static \Illuminate\Database\Query\Builder|\Configuracion whereValor($value)
 * @method static \Illuminate\Database\Query\Builder|\Configuracion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Configuracion whereUpdatedAt($value)
 * @property-read mixed $estatus_display 
 */
class Configuracion extends BaseModel implements SimpleTableInterface {

    protected $table = "configuraciones";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = array("variable", "valor");

    public static function set($variable, $valor) {
        $config = Configuracion::where('variable', '=', $variable)->first();
        $config->valor = $valor;
        $config->save();
    }

    public static function get($variable) {
        $config = Configuracion::where('variable', '=', $variable)->first();
        if (is_object($config)) {
            return $config->valor;
        }
        return false;
    }

    /**
     * Array clave valor que le asocia a un atributo del modelo una oración o una frase que describe al atributo.
     * Se usa para construir los mensajes de error.
     * @return array
     */
    protected function getPrettyFields() {
        return [
            'variable' => 'Variable',
            'valor' => 'Valor',
        ];
    }

    /**
     * Oración o palabra mas descriptiva del nombre de la tabla que maneja el modelo
     * 
     * @return string
     */
    public function getPrettyName() {
        return "Configuraciones";
    }

}
