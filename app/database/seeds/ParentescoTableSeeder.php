<?php

class ParentescoTableSeeder extends Seeder {

    public function run() {
        $parentescos = array('Padre',
            'Madre',
            'Hermano(a)',
            'Tío(a)',
            'Primo(a)',
            'Esposo(a)',
            'Amigo(a)');
        foreach ($parentescos as $parentesco) {
            Parentesco::create(array('nombre' => $parentesco));
        }
    }

}
