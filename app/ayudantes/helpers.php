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
