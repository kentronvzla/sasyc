<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConfiguracionSeeder
 *
 * @author Nadin Yamani
 */
class ConfiguracionSeeder extends Seeder {

    public function run() {
        DB::table('configuraciones')->truncate();

        Configuracion::create(array(
            'variable' => 'version',
            'valor' => '0.1',
        ));
        Configuracion::create(array(
            'variable' => 'claveproyecto',
            'valor' => 'Wm0Lko6ulpWJzZ1wU32bxWg3aMj99Mcv',
        ));
        Configuracion::create(array(
            'variable' => 'ambiente',
            'valor' => 'DESARROLLO',
        ));
        Configuracion::create(array(
            'variable' => 'urlactualizacion',
            'valor' => 'http://appwebdesa.kentron.com.ve:8090/proyectos/public/api/',
        ));
        Configuracion::create(array(
            'variable' => 'secuencia_memo',
            'valor' => 1,
        ));
    }

}
