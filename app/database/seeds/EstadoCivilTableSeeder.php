<?php

class EstadoCivilTableSeeder extends Seeder {

    public function run() {
        $estadosciviles = array('Soltero(a)',
            'Casado(a)',
            'Viudo(a)',
            'Divorciado(a)',
            'Concubino(a)');
        foreach ($estadosciviles as $estadocivil) {
            EstadoCivil::create(array('nombre' => $estadocivil));
        }
    }

}
