<?php

class ReferenteTableSeeder extends Seeder {

    public function run() {
        $referentes = array('Presidente de la republica');
        foreach ($referentes as $referente) {
            Referente::create(array('nombre' => $referente, 'cargo' => $referente));
        }
    }

}
