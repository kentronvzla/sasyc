<?php

class TipoRequerimientoTableSeeder extends Seeder {

    public function run() {
        $tipos = array(
            ['codigo'=>'OP', 'nombre'=>'Orden de pago'],
            ['codigo'=>'ALM', 'nombre'=>'Almacen'],
            ['codigo'=>'FDEL', 'nombre'=>'Fondos Delegados'],
        );
        foreach ($tipos as $tipo) {
            TipoRequerimiento::create($tipo);
        }
    }

}
