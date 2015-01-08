<?php

class OrganismoTableSeeder extends Seeder {

    public function run() {
        $organismos = array('Fundación pueblo soberano(FPS)',
            'Instituto venezolano de seguro social (IVSS)',
            'Misión vivienda',
            'Barrio adentro',
            'Otros');
        foreach ($organismos as $organismo) {
            Organismo::create(array('nombre' => $organismo));
        }
    }

}
