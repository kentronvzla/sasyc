<?php
return array(
    'default' => 'mysql',

    'connections' => array(
        'mysql' => array(
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'sasyc',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ),
        'pgsql' => array(
            'driver' => 'pgsql',
            'host' => 'appwebdesa.kentron.com.ve',
            'database' => 'sasyc_desarrollo',
            'username' => 'sasyc',
            'password' => 'sasyc',
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
        ),
    ),
);
