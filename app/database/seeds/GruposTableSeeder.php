<?php

class GruposTableSeeder extends Seeder {

    public function run() {

        Sentry::createGroup(array(
            'name' => 'Atención Inicial'
        ));

        Sentry::createGroup(array(
            'name' => 'Trabajador Social'
        ));

        Sentry::createGroup(array(
            'name' => 'Autorizador'
        ));

        Sentry::createGroup(array(
            'name' => 'Administrador'
        ));
        //, 'permissions' => '{"superuser":1}'
    }

}
