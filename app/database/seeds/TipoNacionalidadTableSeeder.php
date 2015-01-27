<?php

class TipoNacionalidadTableSeeder extends Seeder {

    public function run() {
        $tiposnacionalidades = array('Cédula (V)',
            'Cédula (E)');
        foreach ($tiposnacionalidades as $tiponacionalidad) {
            TipoNacionalidad::create(array('nombre' => $tiponacionalidad));
        }
    }

}
