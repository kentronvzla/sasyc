<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function str_plural_spanish($word) {
    $vocales = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U"];
    if (ends_with($word, $vocales)) {
        return $word . 's';
    } else {
        return $word . 'es';
    }
}

function str_singular_spanish($word) {
    if (ends_with($word, 'es') && !ends_with($word, "tes")) {
        return substr($word, 0, -2);
    } elseif (ends_with($word, 's')) {
        return substr($word, 0, -1);
    } else {
        return $word;
    }
}

/**
 * Recibe una variable del tipo float y la convierte en un string con formato de dinero.
 * @param float $value
 * @return float Expresión float convertida a float
 * @throws InvalidArgumentException Lanza una excepción si el parametro no es un float valido
 */
function tm($value, $decimals = 2) {
    if (strpos($value, ',') !== false) {
        throw new InvalidArgumentException("El parámetro $value no es un float válido");
    }
    return number_format((float) $value, $decimals, ',', '.');
}

/**
 * Recibe un string con formato de dinero ejemplo: 12.000.00,31
 * y retorna una variable del tipo float del numero recibido.
 * @param string $value
 * @return float Numero convertido a float
 */
function tf($value) {
    if ($value == "") {
        return 0;
    }
    $value = str_replace('.', '', $value);
    return str_replace(',', '.', $value);
}
