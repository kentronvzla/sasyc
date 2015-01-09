<?php

class RecaudosTableSeeder extends Seeder {

    public function run() {
        Organismo::create(array('nombre' => 'Fundación (FPS)', 'ind_externo' => '0'));
        Organismo::create(array('nombre' => 'Instituto (IVSS)', 'ind_externo' => '1'));
        Organismo::create(array('nombre' => 'Misión vivienda', 'ind_externo' => '1'));
        Organismo::create(array('nombre' => 'Barrio adentro', 'ind_externo' => '1'));
    }
}
