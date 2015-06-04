<?php

class ProcesoTableSeeder extends Seeder {

    public function run() {
        $tipos = array(
            ['nombre'=>'Orden de pago', 'tipo_doc'=>'DOC1', 'ind_cantidad'=>true, 'ind_monto'=>true, 'ind_beneficiario'=>true],
            ['nombre'=>'Almacen', 'tipo_doc'=>'DOC2', 'ind_cantidad'=>true, 'ind_monto'=>false,'ind_beneficiario'=>false],
            ['nombre'=>'Fondos Delegados', 'tipo_doc'=>'DOC3', 'ind_cantidad'=>false, 'ind_monto'=>true,'ind_beneficiario'=>false],
        );
        foreach ($tipos as $tipo) {
            Proceso::create($tipo);
        }
    }

}
