<?php

class RecepcionTableSeeder extends Seeder {

    public function run() {
        $recepciones = array('Presidenciales',
            'Gobierno y trabajo de calle',
            'Atención Inicial');
        foreach ($recepciones as $recepcion) {
            Recepcion::create(array('nombre' => $recepcion));
        }
    }
}
