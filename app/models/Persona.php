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
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property integer $tipo_nacionalidad_id
 * @property integer $ci
 * @property string $sexo
 * @property integer $estado_civil_id
 * @property string $lugar_nacimiento
 * @property string $fecha_nacimiento
 * @property integer $nivel_academico_id
 * @property integer $parentesco_id
 * @property integer $estado_id
 * @property integer $municipio_id
 * @property integer $parroquia_id
 * @property string $ciudad
 * @property string $zona_sector
 * @property string $calle_avenida
 * @property string $apto_casa
 * @property string $telefono_fijo
 * @property string $telefono_celular
 * @property string $telefono_otro
 * @property string $email
 * @property string $twitter
 * @property boolean $ind_trabaja
 * @property string $ocupacion
 * @property float $ingreso_mensual
 * @property string $observaciones
 * @property string $ind_asegurado
 * @property string $empresa_seguro
 * @property string $cobertura
 * @property string $otro_apoyo
 * @property string $como_conocio_fps
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoNacionalidad $tipoNacionalidad
 * @property-read \EstadoCivil $estadoCivil
 * @property-read \NivelAcademico $nivelAcademico
 * @property-read \Parentesco $parentesco
 * @property-read \Estado $estado
 * @property-read \Municipio $municipio
 * @property-read \Parroquia $parroquia
 * @method static \Illuminate\Database\Query\Builder|\Persona whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereNombre($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereApellido($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTipoNacionalidadId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCi($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereSexo($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereEstadoCivilId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereLugarNacimiento($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereFechaNacimiento($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereNivelAcademicoId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereParentescoId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereEstadoId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereMunicipioId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereParroquiaId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCiudad($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereZonaSector($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCalleAvenida($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereAptoCasa($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTelefonoFijo($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTelefonoCelular($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTelefonoOtro($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTwitter($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereIndTrabaja($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereOcupacion($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereIngresoMensual($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereObservaciones($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereIndAsegurado($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereEmpresaSeguro($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCobertura($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereOtroApoyo($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereComoConocioFps($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereUpdatedAt($value) 
 */
class Persona extends BaseModel {

    protected $table = "personas";
    protected $dates = ['fecha_nacimiento'];

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'tipo_nacionalidad_id', 'ci', 'sexo',
        'estado_civil_id', 'lugar_nacimiento', 'fecha_nacimiento',
        'nivel_academico_id', 'parentesco_id', 'estado_id', 'municipio_id',
        'parroquia_id', 'ciudad', 'zona_sector', 'calle_avenida', 'apto_casa',
        'telefono_fijo', 'telefono_celular', 'telefono_otro', 'email',
        'twitter', 'ind_trabaja', 'ocupacion', 'ingreso_mensual',
        'observaciones', 'ind_asegurado', 'empresa_seguro', 'cobertura',
        'otro_apoyo', 'como_conocio_fps',
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
        'tipo_nacionalidad_id' => 'required|integer',
        'ci' => 'required|integer',
        'sexo' => '',
        'estado_civil_id' => 'integer',
        'lugar_nacimiento' => '',
        'fecha_nacimiento' => '',
        'nivel_academico_id' => 'integer',
        'parentesco_id' => 'integer',
        'estado_id' => 'integer',
        'municipio_id' => 'integer',
        'parroquia_id' => 'integer',
        'ciudad' => '',
        'zona_sector' => '',
        'calle_avenida' => '',
        'apto_casa' => '',
        'telefono_fijo' => 'max:20|min:10|regex:/^[0-9.-]*$/',
        'telefono_celular' => 'max:20|min:10|regex:/^[0-9.-]*$/',
        'telefono_otro' => 'max:20|min:10|regex:/^[0-9.-]*$/',
        'email' => 'email',
        'twitter' => '',
        'ind_trabaja' => '',
        'ocupacion' => '',
        'ingreso_mensual' => '',
        'observaciones' => '',
        'ind_asegurado' => '',
        'empresa_seguro' => '',
        'cobertura' => '',
        'otro_apoyo' => '',
        'como_conocio_fps' => '',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'tipo_nacionalidad_id' => 'Nacionalidad',
            'ci' => 'C.I.',
            'sexo' => 'Sexo',
            'estado_civil_id' => 'Estado civil',
            'lugar_nacimiento' => 'Lugar de nacimiento',
            'fecha_nacimiento' => 'Fecha de nacimiento',
            'nivel_academico_id' => 'Nivel de instrucción',
            'parentesco_id' => 'Parentesco',
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

    /**
     * Define una relación pertenece a TipoNacionalidad
     * @return TipoNacionalidad
     */
    public function tipoNacionalidad() {
        return $this->belongsTo('TipoNacionalidad');
    }

    /**
     * Define una relación pertenece a EstadoCivil
     * @return EstadoCivil
     */
    public function estadoCivil() {
        return $this->belongsTo('EstadoCivil');
    }

    /**
     * Define una relación pertenece a NivelAcademico
     * @return NivelAcademico
     */
    public function nivelAcademico() {
        return $this->belongsTo('NivelAcademico');
    }

    /**
     * Define una relación pertenece a Parentesco
     * @return Parentesco
     */
    public function parentesco() {
        return $this->belongsTo('Parentesco');
    }

    /**
     * Define una relación pertenece a Estado
     * @return Estado
     */
    public function estado() {
        return $this->belongsTo('Estado');
    }

    /**
     * Define una relación pertenece a Municipio
     * @return Municipio
     */
    public function municipio() {
        return $this->belongsTo('Municipio');
    }

    /**
     * Define una relación pertenece a Parroquia
     * @return Parroquia
     */
    public function parroquia() {
        return $this->belongsTo('Parroquia');
    }

    public static function findOrNewByCedula($nacionalidad, $cedula) {
        $var = static::whereTipoNacionalidadId((int) $nacionalidad)->whereCi((int) $cedula)->first();
        if ($var == null) {
            return new Persona();
        }
        return $var;
    }

    public function setFechaNacimientoAttribute($value) {
        $this->attributes['fecha_nacimiento'] = Carbon::createFromFormat('d/m/Y',$value);
    }

}
