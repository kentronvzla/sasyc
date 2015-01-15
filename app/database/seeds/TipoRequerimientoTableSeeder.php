<?php

class TipoRequerimientoTableSeeder extends Seeder {

    public function run() {
        $tiposrequerimientos = array('Servicio',
            'Material');
        foreach ($tiposrequerimientos as $tiposrequerimiento) {
            TipoRequerimiento::create(array('nombre' => $tiposrequerimiento));
        }
    }

}
