<?php

class EstadoTableSeeder extends Seeder {

    public function run() {
        $estados = [
            'Dtto. Capital',
            'Anzoátegui',
            'Apure',
            'Aragua',
            'Barinas',
            'Bolívar',
            'Carabobo',
            'Cojedes',
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
            'Amazonas',
            'Delta Amacuro',
            'Vargas',
            'Zonas Inhóspitas',
        ];
        foreach ($estados as $estado) {
            Estado::create(array('nombre' => $estado));
        }
    }

}
