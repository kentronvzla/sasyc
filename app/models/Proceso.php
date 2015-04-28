<?php

/**
 * Description of Proceso
 *
 * @author Nadin Yamani
 */
class Proceso extends BaseModel {

    protected $table = "procesos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'tipo_doc', 'ind_cantidad', 'ind_monto', 'ind_beneficiario',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save,
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre'=>'required',
        'tipo_doc'=>'required',
        'ind_cantidad'=>'required',
        'ind_monto'=>'required',
        'ind_beneficiario'=>'required',
    ];

    protected function getPrettyFields() {
        return [
            'nombre'=>'Proceso',
            'tipo_doc'=>'Tipo de documento',
            'ind_cantidad'=>'¿Solicita Cantidad?',
            'ind_monto'=>'¿Solicita Monto?',
            'ind_beneficiario'=>'¿Solicita Beneficiario?',
        ];
    }

    public function getPrettyName() {
        return "Proceso";
    }
    
    public static function getCombo($idrequerimiento = "", array $condiciones = []) {
        //$procesos = Proceso::find((int) $idrequerimiento);
        $procesos = Requerimiento::find((int) $idrequerimiento);
        $retorno = array('' => 'Seleccione.');
        if (is_object($procesos)) {
            
            $actividades = $procesos->procesos;
            foreach ($actividades as $registro) {
                $retorno[$registro->id] = $registro->nombre;
            }
        } else {
            $retorno = array('' => 'Seleccione primero un tipo de proceso');
        }
        return $retorno;
    }
    /*
     * public static function getCombo($idTipoAyuda = "", array $condiciones = []) {
        $tipoAyuda = TipoAyuda::find((int) $idTipoAyuda);
        $retorno = array('' => 'Seleccione.');
        if (is_object($tipoAyuda)) {
            $actividades = $tipoAyuda->areas;
            foreach ($actividades as $registro) {
                $retorno[$registro->id] = $registro->nombre;
            }
        } else {
            $retorno = array('' => 'Seleccione primero un tipo de ayuda');
        }
        return $retorno;
    }
     */

}
