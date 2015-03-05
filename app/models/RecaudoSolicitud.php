<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * RecaudoSolicitud
 *
 * @property integer $id
 * @property integer $solicitud_id
 * @property integer $recaudo_id
 * @property boolean $ind_recibido
 * @property string $fecha_vencimiento
 * @property mixed $documento
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @property-read \Recaudo $recaudo
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereSolicitudId($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereRecaudoId($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereIndRecibido($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereFechaVencimiento($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereDocumento($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereUpdatedAt($value)
 * @property-read mixed $documento_link 
 * @property-read mixed $estatus_display 
 */
class RecaudoSolicitud extends BaseModel implements DefaultValuesInterface, SimpleTableInterface {

    protected $table = "recaudo_solicitud";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'solicitud_id', 'recaudo_id', 'ind_recibido', 'fecha_vencimiento', 'documento',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'solicitud_id' => 'required|integer',
        'recaudo_id' => 'required|integer',
        'ind_recibido' => '',
        'fecha_vencimiento' => '',
        'documento' => '',
    ];
    protected $dates = ['fecha_vencimiento'];

    protected function getPrettyFields() {
        return [
            'solicitud_id' => 'Solicitud',
            'recaudo_id' => 'Recaudo',
            'ind_recibido' => '¿Recibido?',
            'fecha_vencimiento' => 'Fecha de vencimiento',
            'documento' => 'Documento',
            'documento_link' => 'Ver'
        ];
    }

    public function getPrettyName() {
        return "recaudo_solicitud";
    }

    /**
     * Define una relación pertenece a Solicitud
     * @return Solicitud
     */
    public function solicitud() {
        return $this->belongsTo('Solicitud');
    }

    /**
     * Define una relación pertenece a Recaudo
     * @return Recaudo
     */
    public function recaudo() {
        return $this->belongsTo('Recaudo');
    }

    public static function findOrNewBySolicitudRecaudo($solicitud, $recaudo) {
        $var = static::whereSolicitudId((int) $solicitud)->whereRecaudoId((int) $recaudo)->first();
        if ($var == null) {
            return new RecaudoSolicitud();
        }
        return $var;
    }

    public function setFechaVencimientoAttribute($value) {
        if ($value != "") {
            $this->attributes['fecha_vencimiento'] = Carbon::createFromFormat('d/m/Y', $value);
        }
    }

    public function setDocumentoAttribute() {
        if (Input::hasFile('documento')) {
            $base_path = storage_path('adjuntos');
            $base_path = $base_path . DIRECTORY_SEPARATOR . $this->solicitud_id;

            if (!File::exists($base_path)) {
                File::makeDirectory($base_path);
            }
            $file = Input::file('documento');
            $fileName = $file->getClientOriginalName();
            if ($this->documento != "") {
                File::delete($base_path . DIRECTORY_SEPARATOR . $this->documento);
            }
            while (File::exists($base_path . DIRECTORY_SEPARATOR . $fileName)) {
                $fileName.=rand(0, 9) . $fileName;
            }
            $file->move($base_path, $fileName);
            $this->attributes['documento'] = $fileName;
        }
    }

    public function getDocumentoLinkAttribute() {
        if ($this->documento == "") {
            return "No tiene";
        }
        return HTML::link('recaudossolicitud/descargar/' . $this->id, 'Descargar');
    }

    public function getDefaultValues() {
        return [
            'ind_recibido' => false,
        ];
    }

    public function getTableFields() {
        return [
            'recaudo->descripcion',
            'ind_recibido',
            'fecha_vencimiento',
            'documento_link',
        ];
    }

    public function validate($model = null) {
        if (parent::validate($model)) {
            if ($this->fecha_vencimiento == "" && $this->recaudo->ind_vence) {
                $this->addError('fecha_vencimiento', "La fecha de vencimiento es necesaria");
            }
        }
        return !$this->hasErrors();
    }

}
