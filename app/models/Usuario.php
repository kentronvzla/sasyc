<?php

/**
 * Usuario
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $nombre
 * @property boolean $activated
 * @property string $activation_code
 * @property string $activated_at
 * @property string $last_login
 * @property string $persist_code
 * @property string $reset_password_code
 * @property integer $IDCANDIDATO
 * @property integer $VERSION
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereActivated($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereActivationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereActivatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereLastLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario wherePersistCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereResetPasswordCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereIDCANDIDATO($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereVERSION($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereUpdatedAt($value)
 */
class Usuario extends BaseModel implements SimpleTableInterface {

    protected $primaryKey = "id";

    /**
     * Tabla del modelo
     * @var string
     */
    protected $table = 'users';

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = array(
        'email', 'password', 'nombre', 'activated'
    );

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = array(
        'email' => 'required|max:100',
        'password' => 'required',
        'nombre' => 'required',
    );

    /**
     * Array clave valor que le asocia a un atributo del modelo una oración o una frase que describe al atributo.
     * Se usa para construir los mensajes de error.
     * @return array
     */
    protected function getPrettyFields() {
        return array(
            'email' => 'Login',
            'password' => 'Contraseña',
            'nombre' => 'Nombre',
            'nombregrupo' => 'Grupo',
            'activated' => '¿Activo?',
            'activatedfor' => '¿Activo?'
        );
    }

    /**
     * Oración o palabra mas descriptiva del nombre de la tabla que maneja el modelo
     * 
     * @return string
     */
    public function getPrettyName() {
        return "Usuarios";
    }

    public function setPasswordAttribute($value) {
        if ($value != "") {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function getActivatedforAttribute() {
        return static::$cmbsino[$this->activated];
    }

    public function grupos() {
        return $this->belongsToMany('Grupo', 'users_groups', 'user_id', 'group_id');
    }

    public function getNombregrupoAttribute() {
        $grupos = $this->grupos;
        if (count($grupos) == 0) {
            return "";
        }
        return $grupos[0]->name;
    }

    public function getIdgrupoAttribute() {
        $grupos = $this->grupos;
        if (count($grupos) == 0) {
            return "";
        }
        return $grupos[0]->id;
    }

    public static function puedeAcceder($permiso) {
        return Sentry::getUser()->hasAccess($permiso);
    }

    public function getTableFields() {
        return ['email', 'nombre', 'nombregrupo', 'activatedfor'];
    }

}
