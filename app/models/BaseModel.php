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
abstract class BaseModel extends Eloquent implements SelectInterface, SimpleTableInterface, DecimalInterface {

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save,
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [];
    protected $manejaConcurrencia;
    protected $validarModelo = true;
    protected $displayTable = [];
    protected static $array_meses = ['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
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
    public static $cmbsexo = array(
        '' => 'Seleccione',
        'M' => 'Masculino',
        'F' => 'Femenino'
    );
    protected static $cmbsino = [
        '0' => 'No',
        '1' => 'Si'
    ];
    public static $estatusArray = [
        'ELA' => 'Elaboración',
        'ART' => 'Articulada',        
        'ELD' => 'Asignada a Departamento',
        'EAA' => 'Asignada a Analista',
        'ACA' => 'Aceptada por el analista',
        'PPA' => 'Procesado por SASYC',
        //-----------------------------
        'APR' => 'Aprobado',
        'DEV' => 'Devuelta por Kerux',
        'PEN' => 'Pendiente',
        'ANU'=>'Anulado',
        'CER'=>'Cerrado'
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->errors = new \Illuminate\Support\MessageBag();
        $this->validator = \App::make('validator');
        $this->manejaConcurrencia = true;
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
        if (!isset($model->id) && method_exists($this, 'getDefaultValues')) {
            $default = $model->getDefaultValues();
            $model->attributes = array_merge($default, $this->attributes);
        }
        if($this->validarModelo){
            return $this->validate($model);
        }
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
        $v = $this->validator->make($this->attributes, $this->rules);
        $v->setAttributeNames($this->getPrettyFields());
        if ($v->passes() && $this->verificarConcurrencia()) {
            $this->afterValidate();
            return true;
        }
        $this->errors->merge($v->messages());
        return false;
    }

    private function verificarConcurrencia(){
        if($this->manejaConcurrencia && $this->id!=''){
            $oldObject = self::findOrFail($this->id);
            //si no pasan la version se asume que no se quiere validar la concurrencia
            if($oldObject->version != Input::get('version', $oldObject->version)){
                $this->addError('version','Otro usuario ya actualizó este registro. Porfavor refresque la página.');
                return false;
            }else{
                $this->version++;
            }
        }
        return true;
    }

    public static function getCampoCombo() {
        return "nombre";
    }

    public static function getCombo($campo = "Seleccione", array $condiciones = null) {
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
            $retorno[$registro->id] = $registro->{$campoCombo};
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

    public function fill(array $atributos) {
        foreach ($atributos as $key => $atributo) {
            if ($atributo == "" && !$this->isBooleanField($key)) {
                $atributos[$key] = null;
            } else if ($atributo == "" || is_null($atributo)) {
                $atributos[$key] = false;
            }
        }
        return parent::fill($atributos);
    }

    public static function getNombreTabla() {
        $obj = new static();
        return $obj->table;
    }

    public function getValueAt($key, $format = true) {
        $arr = explode('->', $key);
        switch (count($arr)) {
            case 4:
                if (isset($this->{$arr[0]}->{$arr[1]}->{$arr[2]}->{$arr[3]})) {
                    return $this->{$arr[0]}->{$arr[1]}->{$arr[2]}->{$arr[3]};
                }
            case 3:
                if (isset($this->{$arr[0]}->{$arr[1]}->{$arr[2]})) {
                    return $this->{$arr[0]}->{$arr[1]}->{$arr[2]};
                }
                break;
            case 2:
                if (isset($this->{$arr[0]}->{$arr[1]})) {
                    return $this->{$arr[0]}->{$arr[1]};
                }
            case 1:
                if ($format && $this->isBooleanField($key) &&
                    isset(static::$cmbsino[$this->{$key}])) {
                    return static::$cmbsino[$this->{$key}];
                }
                if ($format && $this->isDateField($key) && is_object($this->{$key})) {
                    return $this->{$key}->format('d/m/Y');
                }
                return $this->{$key};
        }
        return "";
    }

    public function getPublicFields() {
        $arrDisplay = $this->getTableFields();
        $arrReturn = [];
        foreach ($arrDisplay as $display) {
            $arrReturn[$display] = $this->getDescription($display);
        }
        return $arrReturn;
    }

    protected function addError($var, $description) {
        $this->errors->add($var, $description);
    }

    public function getBaseDescription($attr) {
        $arr = explode('->', $attr);
        if (count($arr) > 1) {
            $snakeString = snake_case($arr[0]) . '_id';
            return $this->getDescription($snakeString);
        }
        return $this->getDescription($attr);
    }

    public function getDescription($attr) {
        $arr = explode('->', $attr);
        switch (count($arr)) {
            case 4:
                $obj = $this->{$arr[0]}()->getRelated()->{$arr[1]}()->getRelated()->{$arr[2]}()->getRelated();
                return $obj->getPrettyFields()[$arr[3]];
            case 3:
                $rel2 = str_replace('_id', '', $arr[1]);
                $camelField = camel_case($rel2);
                $obj = $this->{$arr[0]}()->getRelated()->{$camelField}()->getRelated();
                return $obj->getPrettyFields()[$arr[2]];
            case 2:
                $obj = $this->{$arr[0]}()->getRelated();
                return $obj->getPrettyFields()[$arr[1]];
            case 1:
                return $this->getPrettyFields()[$arr[0]];
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
        $related = $this->getRelatedField($field, false)->getRelated();
        $className = get_class($related);
        if (method_exists($related, 'getParent')) {
            $relatedObj = $this->getRelatedField($field, true);
            if (is_object($relatedObj)) {
                return call_user_func(array($className, 'getCombo'), $relatedObj->{$related->getParent()});
            } else {
                return call_user_func(array($className, 'getCombo'));
            }
        } else {
            return call_user_func(array($className, 'getCombo'));
        }
    }

    public function isDateField($field) {
        $field = str_replace(['_desde','_hasta'],'',$field);
        return in_array($field, $this->dates);
    }

    private function getRelatedField($field, $getInstance = false) {
        $arr = explode('->', $field);
        switch (count($arr)) {
            case 3:
                $field = str_replace('_id', '', $arr[2]);
                $camelField = camel_case($field);
                $parent = $this->{$arr[0]}()->getRelated()->{$arr[1]}()->getRelated();
                if (method_exists($parent, $camelField)) {
                    //Return..
                    if ($getInstance && isset($this->{$arr[0]}->{$arr[1]}->{$camelField})) {
                        return $this->{$arr[0]}->{$arr[1]}->{$camelField};
                    } else if (!$getInstance) {
                        return $parent->{$camelField}();
                    }
                }
            case 2:
                $field = str_replace('_id', '', $arr[1]);
                $camelField = camel_case($field);
                $parent = $this->{$arr[0]}()->getRelated();
                //Method Existss??
                if (method_exists($parent, $camelField)) {
                    //Return..
                    if ($getInstance && isset($this->{$arr[0]}->{$camelField})) {
                        return $this->{$arr[0]}->{$camelField};
                    } else if (!$getInstance) {
                        return $parent->{$camelField}();
                    }
                }
            case 1:
                $field = str_replace('_id', '', $field);
                $camelField = camel_case($field);
                //Method Existss??
                if (method_exists($this, $camelField)) {
                    //Return..
                    if ($getInstance && isset($this->{$camelField})) {
                        return $this->{$camelField};
                    } else if (!$getInstance) {
                        return $this->{$camelField}();
                    }
                }
        }
        return null;
    }

    public function isBooleanField($field) {
        return Str::startsWith($field, 'ind_');
    }

    public function getTableFields() {
        return $this->fillable;
    }

    public static function getDecimalFields() {
        return [];
    }

    public function isRequired($field) {
        $rules = $this->rules;
        if (isset($rules[$field])) {
            return strpos($rules[$field], 'required') !== false && strpos($rules[$field], 'required_') === false;
        }
        return false;
    }

    public function isDecimalField($field) {
        return in_array($field, static::getDecimalFields());
    }

    protected function afterValidate() {

    }

    public function getFillable() {
        return $this->fillable;
    }

    public function getEstatusDisplayAttribute() {
        return static::$estatusArray[$this->estatus];
    }

    public function desabilitarConcurrencia(){
        $this->manejaConcurrencia = false;
    }

    public function desabilitarValidaciones(){
        $this->validarModelo = false;
    }

    public abstract function getPrettyName();

    protected abstract function getPrettyFields();
}
