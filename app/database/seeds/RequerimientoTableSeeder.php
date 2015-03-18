<?php

class RequerimientoTableSeeder extends Seeder {

    public function run() {
        Requerimiento::create(array('nombre' => 'Operación',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Intervención Quirurquica',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Pinzas, tijeras, bisturies',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Equipo Médico',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Cama clinica automática o manual',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Cama Clinica',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Lapiz, Número 2',
            'cod_item' => '000016-5',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '2',
            'descripcion' => 'Lapiz',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Tratamiento medicos',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Tratamiento médico',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Intervención quirurgica',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Intervención quirurgica',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Camara, modelo digital',
            'cod_item' => '000012-7',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '2',
            'descripcion' => 'Camara',
            'tipo_ayuda_id' => '2'));
        Requerimiento::create(array('nombre' => 'Tratamiento odontologico',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Tratamiento odontológico',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Cirugía',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Cirugía',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Mesa de conferencia, forma rectagular',
            'cod_item' => '000011-5',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '2',
            'descripcion' => 'Mesa',
            'tipo_ayuda_id' => '2'));
        Requerimiento::create(array('nombre' => 'Marcador, punta gruesa',
            'cod_item' => '000015-3',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '2',
            'descripcion' => 'Marcador',
            'tipo_ayuda_id' => '2'));
        Requerimiento::create(array('nombre' => 'Intervención quirurgica material sintesis',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Interv. Quirurg. material sintesis',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Telefono, modelo inalambrico',
            'cod_item' => '000010-3',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '2',
            'descripcion' => 'Telefono',
            'tipo_ayuda_id' => '2'));
        Requerimiento::create(array('nombre' => 'Fertilización in vitro',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Ciclo fertilización in vitro',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Block de raya, tamaño carta',
            'cod_item' => '000003-3',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '2',
            'descripcion' => 'Block',
            'tipo_ayuda_id' => '2'));
        Requerimiento::create(array('nombre' => 'Oftalmología',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Especialidad',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Oncología',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Especialidad',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Intervención Quirúgica',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Tratamiento Salud',
            'tipo_ayuda_id' => '1'));
        Requerimiento::create(array('nombre' => 'Canastilla',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '1',
            'descripcion' => 'Canastilla',
            'tipo_ayuda_id' => '2'));
        Requerimiento::create(array('nombre' => 'Mesa de conferencia, forma rectagular',
            'cod_item' => '000011-5',
            'cod_cta' => '401070600',
            'tipo_requerimiento_id' => '2',
            'descripcion' => 'Mesa de Ruedas',
            'tipo_ayuda_id' => '1'));
    }
}
