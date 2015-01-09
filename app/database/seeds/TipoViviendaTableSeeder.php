<?php

class TipoViviendaTableSeeder extends Seeder {

    public function run() {
        $tipoviviendas = array('Quinta',
            'Apartamento',
            'Habitación',
            'Casa',
            'Rancho',
            'Otro');
        foreach ($tipoviviendas as $tipovivienda) {
            TipoVivienda::create(array('nombre' => $tipovivienda));
        }
    }

}
