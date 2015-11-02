<?php

class SegurosTableSeeder extends Seeder {

    public function run() {
        $seguros = array('Seguros Horizonte',
            'Seguros Mercantil',
            'Seguros La Previsora',
            'Rescarven',
            'Seguros Altamira',
            'Seguros Caracas',
            'Seguros Venezuela',
            'Multinacional de Seguros',
            'ParSalud',
            'Vidamed Consultores C.A.',
            'Ipasme',
            'Seguros Qualitas',
            'Seguros La Vitalicia',
            'Mapfre Seguros',
            'Sanitas',
            'Venezolana de Seguros',
            'Seguros Constitucion',
            'Fames',
            'Seguros Banesco',
            'Seguros Banvalor',
            'Seguros Federal',
            'Occidental de Seguros',
            'Seguros Premier',
            'Seguros Canarias',
            'Seguros Caroni',
            'Pronto Salud',
            'Iberoamericana de Seguros',
            'Ministerio de Educacion',
            'Uniseguros',
            'Seguros Nuevo Mundo',            
            'Seguros Piramide',
            'Universitas',
            'Bolivariana de Seguros',
            'CANTV',
            'CICPC',
            'SEBIN',
            'PDVSA',
            'CORPOELEC',            
            'Otros',
            'No Posee Seguro');
        foreach ($seguros as $seguro) {
            Seguro::create(array('nombre' => $seguro));
        }
    }

}
