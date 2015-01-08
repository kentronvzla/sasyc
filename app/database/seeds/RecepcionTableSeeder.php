<?php

class RecepcionTableSeeder extends Seeder {

    public function run() {
        $recepciones = array('Presidencia',
            'Ayudantía',
            'Correspondencia',
            'Gobernación');
        foreach ($recepciones as $recepcion) {
            Recepcion::create(array('nombre' => $recepcion));
        }
    }

}
