<?php

/**
 * AyudaCampos
 *
 * @property integer $ID
 * @property string $FORMULARIO
 * @property string $CAMPO
 * @property string $AYUDA
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereID($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereFORMULARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereCAMPO($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereAYUDA($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereUpdatedAt($value)
 * @property integer $VERSION
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereVERSION($value)
 */
class AyudaCampo extends BaseModel {

    /**
     * Tabla del modelo
     * @var string
     */
    protected $table = 'ayuda_campos';
    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = array('campo', 'formulario', 'ayuda');

    public static function buscar($form, $nombre) {
        return static::where('campo', 'LIKE', $nombre)->where('formulario', 'LiKE', $form)->first();
    }

    public static function crear($formulario, $campo) {
        $values = compact('formulario','campo');
        return static::create(array_merge($values, ['ayuda'=>'Pendiente por Documentar']));
    }
    public function validate($model = null)
    {
        if(parent::validate()){
            if(is_object(static::buscar($this->formulario, $this->campo)) && !isset($this->id)){
                $this->errors->add('formulario','El formulario debe ser unico');
            }
            return !$this->hasErrors();
        }
        return false;
    }


    /**
     * Array clave valor que le asocia a un atributo del modelo una oración o una frase que describe al atributo.
     * Se usa para construir los mensajes de error.
     * @return array
     */
    protected function getPrettyFields(){
        return array(
            'formulario' => 'Formulario',
            'campo' => 'Campo',
            'ayuda' => 'Documentacion',
        );
    }

    /**
     * Oración o palabra mas descriptiva del nombre de la tabla que maneja el modelo
     *
     * @return string
     */
    public function getPrettyName() {
        return "Ayuda para los campos";
    }

}
