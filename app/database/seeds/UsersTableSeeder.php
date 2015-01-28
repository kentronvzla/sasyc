<?php

class UsersTableSeeder extends Seeder {

    public function run() {

        Sentry::createUser(array(
            'email' => 'nyamaui@kentron.com.ve',
            'password' => '123456',
            'activated' => true,
        ));

        Sentry::createUser(array(
            'email' => 'rarrieta@kentron.com.ve',
            'password' => '123456',
            'activated' => true,
        ));

        Sentry::createUser(array(
            'email' => 'rurbina@kentron.com.ve',
            'password' => '123456',
            'activated' => true,
        ));
        
        Sentry::createUser(array(
            'email' => 'mmelicio@kentron.com.ve',
            'password' => '123456',
            'activated' => true,
        ));
    }

}
