<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Memo
 *
 * @property integer $id
 * @property string $fecha
 * @property string $numero
 * @property string $origen
 * @property string $destino
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Memo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereFecha($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereNumero($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereOrigen($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereDestino($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereUpdatedAt($value)
 * @property string $asunto 
 * @property integer $origen_id 
 * @property integer $destino_id 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\Memo whereAsunto($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereOrigenId($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereDestinoId($value)
 */
class Memo extends BaseModel implements DefaultValuesInterface {

    protected $table = "memos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'fecha', 'numero', 'origen_id', 'destino_id', 'asunto'
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'fecha' => 'required',
        'numero' => 'required',
        'asunto' => 'required',
        'origen_id' => 'required',
        'destino_id' => 'required',
    ];
    protected $dates = ['fecha'];

    protected function getPrettyFields() {
        return [
            'fecha' => 'Fecha',
            'numero' => 'Número',
            'asunto' => 'Asunto',
            'origen_id' => 'Origen',
            'destino_id' => 'Destino',
        ];
    }

    public function getPrettyName() {
        return "memos";
    }

    public function getDefaultValues() {
        return [
            'asunto' => 'Remisión de Solicitudes de Apoyo',
            'fecha' => Carbon::now(),
        ];
    }

    public static function crear($values) {
        $memo = new Memo();
        $depto = Usuario::find(Sentry::getUser()->id)->departamento;
        $memo->origen_id = $depto->id;
        $memo->destino_id = $values['departamento_id'];
        $numero = Configuracion::get('secuencia_memo');
        $numero++;
        $memo->numero = $numero;
        Configuracion::set('secuencia_memo', $numero);
        $memo->save();
        return $memo;
    }

}
