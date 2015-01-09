<?php

class NivelAcademicoTableSeeder extends Seeder {

    public function run() {
        NivelesAcademico::create(array('nombre' => 'Basico', 'orden' => '1'));
        NivelesAcademico::create(array('nombre' => 'Diversificado', 'orden' => '2'));
        NivelesAcademico::create(array('nombre' => 'Técnico medio', 'orden' => '3'));
        NivelesAcademico::create(array('nombre' => 'Técnico Superior', 'orden' => '4'));
        NivelesAcademico::create(array('nombre' => 'Universitario', 'orden' => '5'));
        NivelesAcademico::create(array('nombre' => 'PostGrado', 'orden' => '6'));
        NivelesAcademico::create(array('nombre' => 'Especialista', 'orden' => '7'));
    }

}
