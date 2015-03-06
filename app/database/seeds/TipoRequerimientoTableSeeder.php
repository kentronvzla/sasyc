<?php

class TipoRequerimientoTableSeeder extends Seeder {

    public function run() {
        $tipos = array(
            ['nombre'=>'Orden de pago'],
            ['nombre'=>'Almacen'],
            ['nombre'=>'Fondos Delegados'],
        );
        foreach ($tipos as $tipo) {
            TipoRequerimiento::create($tipo);
        }
    }

}
