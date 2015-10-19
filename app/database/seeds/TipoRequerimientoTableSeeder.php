<?php

class TipoRequerimientoTableSeeder extends Seeder {

    public function run() {
        $tipos = array(
            ['nombre'=>'Salud'],
            ['nombre'=>'Financieros'],
            ['nombre'=>'Efectivo'],
            ['nombre'=>'Protesis'],
        );
        foreach ($tipos as $tipo) {
            TipoRequerimiento::create($tipo);
        }
    }

}
