<?php

class ParentescoTableSeeder extends Seeder {

    public function run() {
        $parentescos = [
            ['nombre' => 'Hijo', 'inverso' => 'Padre/Madre'],
            ['nombre' => 'Padre', 'inverso' => 'Hijo(a)'],
            ['nombre' => 'Madre', 'inverso' => 'Hijo(a)'],
            ['nombre' => 'Hermano(a)', 'inverso' => 'Hermano(a)'],
            ['nombre' => 'Tío(a)', 'inverso' => 'Sobrino(a)'],
            ['nombre' => 'Primo(a)', 'inverso' => 'Primo(a)'],
            ['nombre' => 'Esposo(a)', 'inverso' => 'Esposo(a)'],
            ['nombre' => 'Amigo(a)', 'inverso' => 'Amigo(a)'],
        ];
        foreach ($parentescos as $parentesco) {
            Parentesco::create($parentesco);
        }
    }

}
