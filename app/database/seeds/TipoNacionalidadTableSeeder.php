<?php

class TipoNacionalidadTableSeeder extends Seeder {

    public function run() {
        $tiposnacionalidades = array('Cédula (E)',
            'Cédula (V)');
        foreach ($tiposnacionalidades as $tiponacionalidad) {
            TipoNacionalidad::create(array('nombre' => $tiponacionalidad));
        }
    }

}
