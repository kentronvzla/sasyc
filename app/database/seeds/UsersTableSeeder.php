<?php

class UsersTableSeeder extends Seeder {

    public function run() {

        Sentry::createUser(array(
            'email' => 'nyamaui@kentron.com.ve',
            'nombre' => 'Nadin Yamaui',
            'password' => '123456',
            'departamento_id'=>1,
            'activated' => true,
        ));

        Sentry::createUser(array(
            'email' => 'rarrieta@kentron.com.ve',
            'nombre' => 'Richard Arrieta',
            'password' => '123456',
            'departamento_id'=>1,
            'activated' => true,
        ));

        Sentry::createUser(array(
            'email' => 'rurbina@kentron.com.ve',
            'nombre' => 'Roberto Urbina',
            'password' => '123456',
            'departamento_id'=>1,
            'activated' => true,
        ));
        
        Sentry::createUser(array(
            'email' => 'mmelicio@kentron.com.ve',
            'nombre' => 'Marvic Melicio',
            'password' => '123456',
            'departamento_id'=>1,
            'activated' => true,
        ));
        
        Sentry::createUser(array(
            'email' => 'elandaeta@kentron.com.ve',
            'nombre' => 'Edgar Landaeta',
            'password' => '123456',
            'departamento_id'=>1,
            'activated' => true,
        ));        
    }

}
