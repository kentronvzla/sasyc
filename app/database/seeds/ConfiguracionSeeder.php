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
        Configuracion::create(array(
            'variable' => 'ccosto',
            'valor' => 10202,
        ));
        Configuracion::create(array(
            'variable' => 'moneda_presupuesto',
            'valor' => 'VEF',
        ));
        Configuracion::create(array(
            'variable' => 'secuencia_memo_presupuesto',
            'valor' => 1,
        ));
        Configuracion::create(array(
            'variable' => 'secuencia_memo_punto_cuenta',
            'valor' => 1,
        ));
        Configuracion::create(array(
            'variable' => 'ind_secuencia_automatica',
            'valor' => "Si",
        ));
        Configuracion::create(array(
            'variable' => 'monto_maximo_memo',
            'valor' => 5000,
        ));
        Configuracion::create(array(
            'variable' => 'presidente',
            'valor' => 'MY Antonio José Pérez Suárez',
        ));
        Configuracion::create(array(
            'variable' => 'coordinador',
            'valor' => 'CAP Jose Holberg Zambrano González',
        ));
        Configuracion::create(array(
            'variable' => 'sitio',
            'valor' => 'VEN',
        ));        
        Configuracion::create(array(
            'variable' => 'porcimpuesto',
            'valor' => '12',
        ));
        Configuracion::create(array(
            'variable' => 'usuariows',
            'valor' => 'SASYCKNT',
        ));
        Configuracion::create(array(
            'variable' => 'passws',
            'valor' => 'GaSQKvKMmTDOgD3XkRYN3yaN1Dunrj6o',
        ));        
    }

}
