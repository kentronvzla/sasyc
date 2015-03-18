<?php

class NivelAcademicoTableSeeder extends Seeder {

    public function run() {
        NivelAcademico::create(array('nombre' => 'Básico', 'orden' => '1'));
        NivelAcademico::create(array('nombre' => 'Diversificado', 'orden' => '2'));
        NivelAcademico::create(array('nombre' => 'Técnico medio', 'orden' => '3'));
        NivelAcademico::create(array('nombre' => 'Técnico Superior', 'orden' => '4'));
        NivelAcademico::create(array('nombre' => 'Universitario', 'orden' => '5'));
        NivelAcademico::create(array('nombre' => 'PostGrado', 'orden' => '6'));
        NivelAcademico::create(array('nombre' => 'Especialista', 'orden' => '7'));
    }

}
