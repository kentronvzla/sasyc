<?php

/**
 * Description of BaseModel
 * Modelo base que extiende a eloquent con todo lo necesario para validaciones.
 * y observadores
 * 
 * Validaciones: Para poder usar la validacion se debe incluir el atributo $rules para el validator.
 * Si se quiere validación especial se debe sobreescribir el metodo Validate.
 * Por defecto el metodo validate es ejecutado con el evento save();
 *
 * @author Nadin Yamaui
 */
abstract class BaseModel extends Eloquent {

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [];
    protected $primaryKey = "id";
    protected $appends = [];
    protected $dates = [];
    protected $manejaConcurrencia;
    protected $displayTable = [];
    protected $booleanFields = [];

    /**
     * Error message bag
     * @var Illuminate\Support\MessageBag
     */
    public $errors;

    /**
     * Validator instance
     * @var Illuminate\Validation\Validators
     */
    protected $validator;
    public static $cmbsino = array(
        '' => '-',
        '1' => 'Si',
        '0' => 'No'
    );
    public static $cmbsexo = array(
        'M' => 'Masculino',
        'F' => 'Femenino'
    );

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->errors = new \Illuminate\Support\MessageBag();
        $this->validator = \App::make('validator');
    }

    /**
     * Nos registramos para los listener de laravel
     * si un hijo desea usar uno debe sobreescribir el metodo.
     * Docs: @link http://laravel.com/docs/eloquent#model-events
     */
    protected static function boot() {
        parent::boot();

        static::creating(function($model) {
            return $model->creatingModel($model);
        });
        static::created(function($model) {
            return $model->createdModel($model);
        });
        static::updating(function($model) {
            return $model->updatingModel($model);
        });
        static::updated(function($model) {
            return $model->updatedModel($model);
        });
        static::saving(function($model) {
            return $model->savingModel($model);
        });
        static::saved(function($model) {
            return $model->savedModel($model);
        });
        static::deleting(function($model) {
            return $model->deletingModel($model);
        });
        static::deleted(function($model) {
            return $model->deletedModel($model);
        });
    }

    public static function create(array $attributes) {
        $model = new static();
        $model->fill($attributes);
        $model->save();
        return $model;
    }

    /**
     * Metodo que se ejecuta antes de crear un objeto
     * Si el retorno es false no se crea el modelo
     * Docs: @link http://laravel.com/docs/eloquent#model-events
     * @return boolean
     */
    public function creatingModel($model) {
        return true;
    }

    /**
     * Metodo que se ejecuta al crear un modelo. 
     * Si se sobre escribe se pierde la funcionalidad de auditar los procesos realizados contra la bd. 
     * Se debe incluir $this->auditarProceso('I');
     * Docs: @link http://laravel.com/docs/eloquent#model-events
     */
    public function createdModel($model) {
        
    }

    /**
     * Metodo que se ejecuta antes de actualizar un objeto. 
     * Si el retorno es false no se actualiza el modelo
     * Docs: @link http://laravel.com/docs/eloquent#model-events
     * @return boolean
     */
    public function updatingModel($model) {
        return true;
    }

    /**
     * Metodo que se ejecuta luego de actualizar un objeto.
     * Si se sobre escribe se pierde la funcionalidad de auditar los procesos realizados contra la BD
     * Se debe incluir $this->auditarProceso('U',$model);
     * Docs: @link http://laravel.com/docs/eloquent#model-events
     */
    public function updatedModel($model) {
        
    }

    /**
     * Metodo que se ejecuta al ejecutar el metodo save del objeto
     * si retorna false no se guardan los cambios en la BD
     * Por defecto llama al metodo validate.
     * Docs: @link http://laravel.com/docs/eloquent#model-events
     * @return boolean
     */
    public function savingModel($model) {
        return $this->validate($model);
    }

    /**
     * Metodo que se ejecuta al terminar de ejecutar el metodo save del objeto
     * Docs: @link http://laravel.com/docs/eloquent#model-events
     */
    public function savedModel($model) {
        
    }

    /**
     * Metodo que se ejecuta antes de eliminar un modelo de la bd
     * si retorna false no se elimina
     * Docs: @link http://laravel.com/docs/eloquent#model-events
     * @return boolean
     */
    public function deletingModel($model) {
        return true;
    }

    /**
     * Metodo que se ejecuta luego de eliminar un objeto de la bd.
     * Si se sobre escribe se pierde la funcionalidad de auditar los procesos realizados contra la BD
     * Se debe incluir $this->auditarProceso('D',$model);
     * Docs: @link http://laravel.com/docs/eloquent#model-events
     */
    public function deletedModel($model) {
        
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * Set error message bag
     * 
     * @var Illuminate\Support\MessageBag
     */
    protected function setErrors($errors) {
        $this->errors = $errors;
    }

    public static function findOrNew($str, $columns = Array()) {
        if ($str == "") {
            return new static();
        } else {
            return static::findOrFail($str);
        }
    }

    /**
     * Validates current attributes against rules
     */
    public function validate($model = null) {
        if (isset($this->attributes['created_at']) && isset($this->attributes[$this->primaryKey])) {
            $objAux = static::find($this->attributes[$this->primaryKey]);
            if (is_object($objAux)) {
                foreach ($this->rules as $key => $rule) {
                    if (strpos($rule, 'unique:') !== false) {
                        $rulesCol = explode('|', $rule);
                        foreach ($rulesCol as $key2 => $val) {
                            if (starts_with($rulesCol[$key2], 'unique:')) {
                                $rulesCol[$key2].=',' . $objAux->{$this->primaryKey} . ',' . $this->primaryKey;
                            }
                        }
                        $this->rules[$key] = implode('|', $rulesCol);
                    }
                }
            }
        }
        $v = $this->validator->make($this->attributes, $this->rules);
        $v->setAttributeNames($this->getPrettyFields());
        if ($v->passes()) {
            return true;
        }
        $this->setErrors($v->messages());
        return false;
    }

    public static function getCombo($campo = "", array $condiciones = null) {
        $campoCombo = static::getCampoCombo();
        if (static::getCampoOrder() == "") {
            $campoOrder = $campoCombo;
        } else {
            $campoOrder = static::getCampoOrder();
        }
        if ($condiciones == null) {
            $registros = self::orderBy($campoOrder)->remember(1)->get();
        } else {
            foreach ($condiciones as $key => $condicion) {
                if ($key == 0) {
                    $registros = self::where($condicion['CAMPO'], '=', $condicion['VALOR']);
                } else {
                    $registros = $registros->where($condicion['CAMPO'], '=', $condicion['VALOR']);
                }
            }
            $registros = $registros->orderBy($campoOrder)->remember(1)->get();
        }

        $retorno = array('' => $campo);
        foreach ($registros as $registro) {
            $retorno[$registro->{static::getPrimaryKey()}] = $registro->{$campoCombo};
        }
        if ($campo == "" && count($retorno) > 1) {
            unset($retorno['']);
        }
        return $retorno;
    }

    public static function getCampoOrder() {
        return "";
    }

    public function hasErrors() {
        return $this->errors->count() > 0;
    }

    public function fill(array $atributos, $filter = "") {
        if ($filter != "") {
            foreach ($atributos as $key => $value) {
                $arr = explode('->', $key);
                if (count($arr) > 1) {
                    $atributos[$arr[1]] = $value;
                }
                unset($atributos[$key]);
            }
        }
        foreach ($atributos as $key => $atributo) {
            if ($atributo == "") {
                $atributos[$key] = null;
            }
        }
        return parent::fill($atributos);
    }

    public static function getNombreTabla() {
        $obj = new static();
        return $obj->table;
    }

    public function getValueAt($key, $format = true) {
        if (strpos($key, '->') === false) {
            if ($format && $this->isBooleanField($key) &&
                    isset(static::$cmbsino[$this->{$key}])) {
                return static::$cmbsino[$this->{$key}];
            }
            return $this->{$key};
        } else {
            $arr = explode('->', $key);
            $relation = $arr[0];
            $attr = $arr[1];
            if (isset($this->{$relation}->{$attr})) {
                return $this->{$relation}->{$attr};
            }
            return "";
        }
    }

    public function getPublicFields() {
        $prettyFields = $this->getPrettyFields();
        if (count($this->displayTable) > 0) {
            $arrDisplay = $this->displayTable;
            $arrReturn = [];
            foreach ($arrDisplay as $display) {
                if (isset($prettyFields[$display])) {
                    $arrReturn[$display] = $prettyFields[$display];
                } else {
                    $arrReturn[$display] = $this->getRelatedDescription($display);
                }
            }
            return $arrReturn;
        } else {
            $hiddenFields = $this->hidden;
            foreach ($hiddenFields as $hidden) {
                unset($prettyFields[$hidden]);
            }
            return $prettyFields;
        }
    }

    protected function addError($var, $description) {
        $this->errors->add($var, $description);
    }

    public function getDescription($attr) {
        //Check for related description
        if (str_contains($attr, '->')) {
            return $this->getRelatedDescription($attr);
        } else {
            $prettyFields = $this->getPrettyFields();
            if (isset($prettyFields[$attr])) {
                return $prettyFields[$attr];
            } else {
                return $attr;
            }
        }
    }

    public function getRelatedDescription($attr) {
        $arr = explode('->', $attr);
        if (count($arr) > 1) {
            $obj = $this->{$arr[0]}()->getRelated();
            return $obj->getPrettyFields()[$arr[1]];
        } else {
            return $attr;
        }
    }

    public function isRelatedField($field) {
        $test = $this->getRelatedField($field);
        //Yes the field is a relationn
        if ($test instanceof Illuminate\Database\Eloquent\Relations\BelongsTo) {
            return true;
        } else {
            return false;
        }
    }

    public function getRelatedOptions($field) {
        $related = $this->getRelatedField($field)->getRelated();
        $className = get_class($related);
        return call_user_func(array($className, 'getCombo'));
    }

    public function isDateField($field) {
        return in_array($field, $this->dates);
    }

    private function getRelatedField($field) {
        $field = str_replace('_id', '', $field);
        $camelField = camel_case($field);
        //Method Existss??
        if (method_exists($this, $camelField)) {
            //Return..
            return $this->{$camelField}();
        }
        return null;
    }

    public function isBooleanField($field) {
        return in_array($field, $this->booleanFields);
    }

    protected abstract function getPrettyName();

    protected abstract function getPrettyFields();

}
