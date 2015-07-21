<?php

class UsersTableSeeder extends Seeder {

    public function run() {

        Sentry::createUser(array(
            'email' => 'sasyc@com.ve',
            'nombre' => 'Usuario Sasyc',
            'password' => '123456',
            'departamento_id' => 1,
            'activated' => true,
        ));

        Sentry::createUser(array(
            'email' => 'rarrieta@kentron.com.ve',
            'nombre' => 'Richard Arrieta',
            'password' => '123456',
            'departamento_id' => 1,
            'activated' => true,
        ));

        Sentry::createUser(array(
            'email' => 'rurbina@kentron.com.ve',
            'nombre' => 'Roberto Urbina',
            'password' => '123456',
            'departamento_id' => 1,
            'activated' => true,
        ));

        Sentry::createUser(array(
            'email' => 'mmelicio@kentron.com.ve',
            'nombre' => 'Marvic Melicio',
            'password' => '123456',
            'departamento_id' => 1,
            'activated' => true,
        ));

        Sentry::createUser(array(
            'email' => 'drobles@kentron.com.ve',
            'nombre' => 'Dhaily Robles',
            'password' => '123456',
            'departamento_id' => 1,
            'activated' => true,
        ));
        Sentry::createUser(array(
            'email' => 'rvalle@kentron.com.ve',
            'nombre' => 'Reysmer Valle',
            'password' => '123456',
            'departamento_id' => 1,
            'activated' => true,
        ));
    }

}
