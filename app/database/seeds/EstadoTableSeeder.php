<?php

class EstadoTableSeeder extends Seeder {

    public function run() {
        $estados = array('Dtto Federal');
        foreach ($estados as $estado) {
            Estado::create(array('nombre' => $estado));
        }
    }

    /*      ,
            'Amazonas',
            'Anzoátegui',
            'Apure',
            'Aragua',
            'Barinas',
            'Bolívar',
            'Carabobo',
            'Cojedes',
            'Delta Amacuro',
            'Falcón',
            'Guárico',
            'Lara',
            'Mérida',
            'Miranda',
            'Monagas',
            'Nueva Esparta',
            'Portuguesa',
            'Sucre',
            'Táchira',
            'Trujillo',
            'Yaracuy',
            'Zulia',
            'Vargas'
     *      */
}
