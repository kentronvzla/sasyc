<?php

class UsersTableSeeder extends Seeder {

    public function run() {

        Sentry::createUser(array(
            'email' => 'sasyc',
            'nombre' => 'Administrador Sasyc',
            'password' => '123456',
            'departamento_id' => 1,
            'activated' => true,
        ));
    }

}
