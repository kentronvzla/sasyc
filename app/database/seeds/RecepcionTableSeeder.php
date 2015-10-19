<?php

class RecepcionTableSeeder extends Seeder {

    public function run() {
        $recepciones = array('Atención Inicial',
            'Actividad Presidencial',
            'Gobierno y Actividad de Calle');
        foreach ($recepciones as $recepcion) {
            Recepcion::create(array('nombre' => $recepcion));
        }
    }
}
