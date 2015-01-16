<?php

class TipoRequerimientoTableSeeder extends Seeder {

    public function run() {
        $tiposrequerimientos = array('Orden de pago',
            'Almacen');
        foreach ($tiposrequerimientos as $tiposrequerimiento) {
            TipoRequerimiento::create(array('nombre' => $tiposrequerimiento));
        }
    }

}
