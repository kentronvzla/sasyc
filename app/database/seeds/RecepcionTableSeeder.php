<?php

class RecepcionTableSeeder extends Seeder {

    public function run() {
        $recepciones = array('Presidencia',
            'Ayudantía',
            'Correspondencia',
            'Actividad presidencial');
        foreach ($recepciones as $recepcion) {
            Recepcion::create(array('nombre' => $recepcion));
        }
    }
}
