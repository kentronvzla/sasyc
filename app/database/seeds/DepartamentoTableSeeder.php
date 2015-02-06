<?php

class DepartamentoTableSeeder extends Seeder {

    public function run() {
        $departamentos = array(
            ['nombre' => 'Bienestar social', 'supervisor_id' => 1],
            ['nombre' => 'Departamento tecnico', 'supervisor_id' => 1],
            ['nombre' => 'Secretaria Ejecutiva', 'supervisor_id' => 1],
        );
        foreach ($departamentos as $departamento) {
            Departamento::create($departamento);
        }
    }

}
