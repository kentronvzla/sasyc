<?php

class MunicipioTableSeeder extends Seeder {

    public function run() {
        Municipio::create(array('nombre' => 'Libertador', 'estado_id' => '1'));
    }
}
