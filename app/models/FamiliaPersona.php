<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FamiliaPersona
 *
 * @author Nadin Yamani
 * @property integer $persona_beneficiario_id
 * @property integer $persona_familia_id
 * @property string $parentesco
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \PersonaBeneficiario $personaBeneficiario
 * @property-read \PersonaFamilia $personaFamilia
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona wherePersonaBeneficiarioId($value) 
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona wherePersonaFamiliaId($value) 
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona whereParentesco($value) 
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona whereUpdatedAt($value) 
 */
class FamiliaPersona extends BaseModel {

    protected $table = "familia_persona";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'persona_beneficiario_id', 'persona_familia_id', 'parentesco',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'persona_beneficiario_id'=>'required|integer', 
'persona_familia_id'=>'required|integer', 
'parentesco'=>'required', 

    ];

    protected function getPrettyFields() {
        return [
            'persona_beneficiario_id' => 'Beneficiario',
            'persona_familia_id' => 'Familiar',
            'parentesco' => 'Parentesco',
        ];
    }

    protected function getPrettyName() {
        return "familia_persona";
    }

    /**
     * Define una relación pertenece a PersonaBeneficiario
     * @return PersonaBeneficiario
     */
    public function personaBeneficiario() {
        return $this->belongsTo('Persona');
    }

    /**
     * Define una relación pertenece a PersonaFamilia
     * @return PersonaFamilia
     */
    public function personaFamilia() {
        return $this->belongsTo('Persona');
    }

}
