<?php

return array(
    /*
      |--------------------------------------------------------------------------
      | Validation Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines contain the default error messages used by
      | the validator class. Some of these rules have multiple versions such
      | as the size rules. Feel free to tweak each of these messages here.
      |
     */

    "accepted" => ":attribute debe ser aceptado.",
    "active_url" => ":attribute no es un link valido.",
    "after" => ":attribute debe ser después de :date.",
    "alpha" => ":attribute debe contener solamente letras.",
    "alpha_dash" => ":attribute debe contener solamente letras, números, y guiones.",
    "alpha_num" => ":attribute may only contain letters and numbers.",
    "array" => ":attribute debe ser un arreglo.",
    "before" => ":attribute debe ser antes de :date.",
    "between" => array(
        "numeric" => ":attribute debe estar entre :min y :max.",
        "file" => ":attribute debe estar entre :min y :max kilobytes.",
        "string" => ":attribute debe tener entre :min y :max caracteres.",
        "array" => ":attribute debe tener entre :min y :max elementos.",
    ),
    "confirmed" => "Las :attribute no coinciden.",
    "date" => ":attribute no es una fecha válida.",
    "date_format" => ":attribute no coincide con el formato :format.",
    "different" => ":attribute y :other deben ser diferente.",
    "digits" => ":attribute debe tener :digits dígitos.",
    "digits_between" => ":attribute debe tener entre :min y :max dígitos.",
    "email" => "El formato :attribute es inválido.",
    "exists" => ":attribute es inválido.",
    "image" => ":attribute debe ser una imagen.",
    "in" => ":attribute es inválido.",
    "integer" => ":attribute debe ser un entero.",
    "ip" => ":attribute debe ser una dirección IP válida.",
    "max" => array(
        "numeric" => ":attribute no puede ser mayor a :max.",
        "file" => ":attribute no puede ser mayor a :max kilobytes.",
        "string" => ":attribute no puede ser mayor a :max caracteres.",
        "array" => ":attribute no puede tener mas de :max elementos.",
    ),
    "mimes" => ":attribute debe ser un archivo de tipo: :values.",
    "min" => array(
        "numeric" => ":attribute debe ser al menos :min.",
        "file" => ":attribute debe tener al menos :min kilobytes.",
        "string" => ":attribute debe tener al menos :min caracteres.",
        "array" => ":attribute debe tener al menos :min elementos.",
    ),
    "not_in" => ":attribute seleccionado es inválido.",
    "numeric" => ":attribute debe ser un número.",
    "regex" => "El formato :attribute es inválido.",
    "required" => ":attribute  es necesario.",
    "required_if" => ":attribute es necesario cuando :other es :value.",
    "required_with" => ":attribute es necesario cuando :values está presente.",
    "required_with_all" => ":attribute es necesario cuando :values están presentes.",
    "required_without" => ":attribute es necesario cuando :values no está presente.",
    "required_without_all" => ":attribute es necesario cuando :values no estan presentes.",
    "same" => ":attribute y :other deben coincidir.",
    "size" => array(
        "numeric" => ":attribute debe ser :size.",
        "file" => ":attribute debe ser :size kilobytes.",
        "string" => ":attribute debe ser :size caracteres.",
        "array" => ":attribute debe contener :size elementos.",
    ),
    "unique" => ":attribute ya ha sido elegido.",
    "url" => "El formato :attribute es inválido.",
    /*
      |--------------------------------------------------------------------------
      | Custom Validation Language Lines
      |--------------------------------------------------------------------------
      |
      | Here you may specify custom validation messages for attributes using the
      | convention "attribute.rule" to name the lines. This makes it quick to
      | specify a specific custom language line for a given attribute rule.
      |
     */
    'custom' => array(),
    /*
      |--------------------------------------------------------------------------
      | Custom Validation Attributes
      |--------------------------------------------------------------------------
      |
      | The following language lines are used to swap attribute place-holders
      | with something more reader friendly such as E-Mail Address instead
      | of "email". This simply helps us make messages a little cleaner.
      |
     */
    'attributes' => array(),
);

