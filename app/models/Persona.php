<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persona
 *
 * @author Nadin Yamani
 */
class Persona extends BaseModel {

    protected $table = "personas";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'nacionalidad', 'ci', 'sexo', 'estado_civil',
        'lugar_nacimiento', 'fecha_nacimiento', 'nivel_instruccion', 'parentesco',
        'estado_id', 'municipio_id', 'parroquia_id', 'ciudad', 'zona_sector',
        'calle_avenida', 'apto_casa', 'telefono_fijo', 'telefono_celular',
        'telefono_otro', 'email', 'twitter', 'ind_trabaja', 'ocupacion',
        'ingreso_mensual', 'observaciones', 'ind_asegurado', 'empresa_seguro',
        'cobertura', 'otro_apoyo', 'como_conocio_fps',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'nacionalidad' => 'required',
        'ci' => 'required|integer',
        'sexo' => 'required',
        'estado_civil' => 'required',
        'lugar_nacimiento' => 'required',
        'fecha_nacimiento' => 'required',
        'nivel_instruccion' => 'required',
        'parentesco' => '',
        'estado_id' => 'integer',
        'municipio_id' => 'integer',
        'parroquia_id' => 'integer',
        'ciudad' => '',
        'zona_sector' => '',
        'calle_avenida' => '',
        'apto_casa' => '',
        'telefono_fijo' => '',
        'telefono_celular' => '',
        'telefono_otro' => '',
        'email' => '',
        'twitter' => '',
        'ind_trabaja' => 'required',
        'ocupacion' => '',
        'ingreso_mensual' => 'required',
        'observaciones' => '',
        'ind_asegurado' => 'required',
        'empresa_seguro' => '',
        'cobertura' => '',
        'otro_apoyo' => '',
        'como_conocio_fps' => '',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'nacionalidad' => 'Nacionalidad',
            'ci' => 'C.I.',
            'sexo' => 'Sexo',
            'estado_civil' => 'Estado civil',
            'lugar_nacimiento' => 'Lugar de nacimiento',
            'fecha_nacimiento' => 'Fecha de nacimiento',
            'nivel_instruccion' => 'Nivel de instrucción',
            'parentesco' => 'Parentesco',
            'estado_id' => 'Estado',
            'municipio_id' => 'Municipio',
            'parroquia_id' => 'Parroquia',
            'ciudad' => 'Ciudad',
            'zona_sector' => 'Zona o sector',
            'calle_avenida' => 'Calle o avenida',
            'apto_casa' => 'Apto/casa Nro.',
            'telefono_fijo' => 'Teléfono fijo',
            'telefono_celular' => 'Teléfono celular',
            'telefono_otro' => 'Otro Teléfono',
            'email' => 'Email',
            'twitter' => 'Twitter',
            'ind_trabaja' => 'Trabaja?',
            'ocupacion' => 'Ocupación',
            'ingreso_mensual' => 'Ingreso mensual',
            'observaciones' => 'Observaciones',
            'ind_asegurado' => 'Asegurado?',
            'empresa_seguro' => 'Empresa seguro',
            'cobertura' => 'Cobertura',
            'otro_apoyo' => 'Otro apoyo otorgado',
            'como_conocio_fps' => 'Como conoció FPS',
        ];
    }

    protected function getPrettyName() {
        return "personas";
    }
    
    public function estado() {
        return $this->belongsTo('Estado', 'estado_id');
    }

    public function municipio() {
        return $this->belongsTo('Municipio', 'municipio_id');
    }

    public function parroquia() {
        return $this->belongsTo('Parroquia', 'parroquia_id');
    }    

}
