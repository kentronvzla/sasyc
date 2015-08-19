<?php

class TipoRequerimientoTableSeeder extends Seeder {

    public function run() {
        $tipos = array(
            ['nombre'=>'Material Médico'],
            ['nombre'=>'Ayudas en efectivo'],
            ['nombre'=>'Protesis'],
        );
        foreach ($tipos as $tipo) {
            TipoRequerimiento::create($tipo);
        }
    }

}
