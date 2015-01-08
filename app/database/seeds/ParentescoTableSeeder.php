<?php

class ParentescoTableSeeder extends Seeder {

    public function run() {
        $parentescos = array('Padre',
            'Madre',
            'Hermono(a)',
            'Tio(a)',
            'Primo(a)',
            'Esposo(a)');
        foreach ($parentescos as $parentesco) {
            Parentesco::create(array('nombre' => $parentesco));
        }
    }

}
