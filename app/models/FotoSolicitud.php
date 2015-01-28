<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FotosSolicitud
 *
 * @author Nadin Yamani
 */
class FotoSolicitud extends BaseModel {

    protected $table = "fotos_solicitud";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'solicitud_id', 'descripcion', 'foto', 'ind_reporte',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'solicitud_id' => 'required|integer',
        'descripcion' => 'required',
        'foto' => 'required',
        'ind_reporte' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'solicitud_id' => 'Solicitud',
            'descripcion' => 'Descripcion',
            'foto' => 'Foto',
            'ind_reporte' => '¿Usar en Reporte?',
        ];
    }

    public function getPrettyName() {
        return "fotos_solicitud";
    }

    /**
     * Define una relación pertenece a Solicitud
     * @return Solicitud
     */
    public function solicitud() {
        return $this->belongsTo('Solicitud');
    }

    public function setFotoAttribute() {
        if (Input::hasFile('foto')) {
            $base_path = storage_path('adjuntos');
            $base_path = $base_path . DIRECTORY_SEPARATOR . $this->solicitud_id;

            if (!File::exists($base_path)) {
                File::makeDirectory($base_path);
            }
            $file = Input::file('foto');
            $fileName = $file->getClientOriginalName();
            if ($this->foto != "") {
                File::delete($base_path . DIRECTORY_SEPARATOR . $this->foto);
            }
            while (File::exists($base_path . DIRECTORY_SEPARATOR . $fileName)) {
                $fileName.=rand(0, 9) . $fileName;
            }
            $file->move($base_path, $fileName);
            $this->attributes['foto'] = $fileName;
        }
    }

    public function getUrlAttribute() {
        return url('fotossolicitud/descargar/' . $this->id);
    }

}
