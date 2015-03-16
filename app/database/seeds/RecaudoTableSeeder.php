<?php

class RecaudoTableSeeder extends Seeder {

    public function run() {
        Recaudo::create(array('nombre' => 'Fotocopias de la cédula de identidad - Solicitante',
            'descripcion' => 'Fotocopia de la cédula de identidad Solicitante',
            'ind_obligatorio' => '0',
            'ind_vence' => '0',
            'ind_activo' => '1', 
            'tipo_ayuda_id' => '1'));
        Recaudo::create(array('nombre' => 'Fotocopia de la cédula de identidad - Beneficiario',
            'descripcion' => 'Fotocopia de la cédula de identidad-Beneficiario',
            'ind_obligatorio' => '0',
            'ind_vence' => '0',
            'ind_activo' => '1', 
            'tipo_ayuda_id' => '1'));
        Recaudo::create(array('nombre' => 'Fotocopia de la cédula de identidad - Beneficiario',
            'descripcion' => 'Fotocopia de la cédula de identidad-Beneficiario',
            'ind_obligatorio' => '0',
            'ind_vence' => '0',
            'ind_activo' => '1', 
            'tipo_ayuda_id' => '2'));        
        Recaudo::create(array('nombre' => 'Carta al presidente de la república',
            'descripcion' => 'Carta al presidente de la república',
            'ind_obligatorio' => '1',
            'ind_vence' => '0',
            'ind_activo' => '1', 
            'tipo_ayuda_id' => '1'));
        Recaudo::create(array('nombre' => 'Carta al presidente de la república',
            'descripcion' => 'Carta al presidente de la república',
            'ind_obligatorio' => '1',
            'ind_vence' => '0',
            'ind_activo' => '1', 
            'tipo_ayuda_id' => '2'));        
        Recaudo::create(array('nombre' => 'Informe médico',
            'descripcion' => 'Informe médico',
            'ind_obligatorio' => '0',
            'ind_vence' => '1',
            'ind_activo' => '1', 
            'tipo_ayuda_id' => '1'));
        Recaudo::create(array('nombre' => 'Presupuestos',
            'descripcion' => 'Presupuestos',
            'ind_obligatorio' => '0',
            'ind_vence' => '1',
            'ind_activo' => '1', 
            'tipo_ayuda_id' => '1'));
        Recaudo::create(array('nombre' => 'Informe socio-económico',
            'descripcion' => 'Informe socio-económico',
            'ind_obligatorio' => '0',
            'ind_vence' => '0',
            'ind_activo' => '1', 
            'tipo_ayuda_id' => '1'));
        Recaudo::create(array('nombre' => 'Examenes de laboratorios',
            'descripcion' => 'Examenes medicos',
            'ind_obligatorio' => '1',
            'ind_vence' => '0',
            'ind_activo' => '1', 
            'tipo_ayuda_id' => '1'));
        Recaudo::create(array('nombre' => 'Foto reciente tamaño carnet',
            'descripcion' => 'Foto tipo carnet',
            'ind_obligatorio' => '1',
            'ind_vence' => '0',
            'ind_activo' => '1', 
            'tipo_ayuda_id' => '1'));
    }

}
