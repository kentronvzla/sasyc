<?php

class ProcesoTableSeeder extends Seeder {

    public function run() {
        $tipos = array(
            ['nombre'=>'Orden de pago', 'ind_cantidad'=>false, 'ind_monto'=>true, 'ind_beneficiario'=>true],
            ['nombre'=>'Solicitudes de suministro', 'ind_cantidad'=>true, 'ind_monto'=>false,'ind_beneficiario'=>false],
            ['nombre'=>'Fondos Delegados', 'ind_cantidad'=>false, 'ind_monto'=>true,'ind_beneficiario'=>false],
        );
        foreach ($tipos as $tipo) {
            Proceso::create($tipo);
        }
    }

}
