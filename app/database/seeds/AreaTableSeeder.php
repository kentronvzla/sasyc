<?php

class AreaTableSeeder extends Seeder {

    public function run() {
        Area::create(array('nombre' => 'Odontologías', 'descripcion' => 'Odontologías', 'tipo_ayuda_id' => '1'));
        Area::create(array('nombre' => 'Traumatología', 'descripcion' => 'Traumatología', 'tipo_ayuda_id' => '1'));
        Area::create(array('nombre' => 'Nefroligía', 'descripcion' => 'Nefroligía', 'tipo_ayuda_id' => '1'));
        Area::create(array('nombre' => 'Obstetricia', 'descripcion' => 'Obstetricia', 'tipo_ayuda_id' => '1'));
        Area::create(array('nombre' => 'Ginecología', 'descripcion' => 'Ginecología', 'tipo_ayuda_id' => '1'));
        Area::create(array('nombre' => 'Cirugía', 'descripcion' => 'Cirugía', 'tipo_ayuda_id' => '1'));
        Area::create(array('nombre' => 'Efectivo', 'descripcion' => 'Efectivo', 'tipo_ayuda_id' => '2'));
    }

}
