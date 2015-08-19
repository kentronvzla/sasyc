<?php

class ParentescoTableSeeder extends Seeder {

    public function run() {
        $parentescos = [
            ['nombre' => 'Hijo', 'inverso' => 'Padre/Madre'],
            ['nombre' => 'Padre', 'inverso' => 'Hijo(a)'],
            ['nombre' => 'Madre', 'inverso' => 'Hijo(a)'],
            ['nombre' => 'Hermano(a)', 'inverso' => 'Hermano(a)'],
            ['nombre' => 'Tío(a)', 'inverso' => 'Sobrino(a)'],
            ['nombre' => 'Sobrino(a)', 'inverso' => 'Tío(a)'],
            ['nombre' => 'Primo(a)', 'inverso' => 'Primo(a)'],
            ['nombre' => 'Concubino(a)', 'inverso' => 'Concubino(a)'],
            ['nombre' => 'Amigo(a)', 'inverso' => 'Amigo(a)'],
            ['nombre' => 'Abuelo(a)', 'inverso' => 'Nieto(a)'],
            ['nombre' => 'Nieto(a)', 'inverso' => 'Abuelo(a)'],
        ];
        foreach ($parentescos as $parentesco) {
            Parentesco::create($parentesco);
        }
    }

}
