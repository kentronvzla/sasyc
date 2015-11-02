<?php

class DefEventoTableSeeder extends Seeder {

    public function run() {
        $defs = array(
            ['tipo_doc' => 'SP008',
            'tipo_evento' => 'GEN',
            'ind_aprueba_auto' => true,
            'ind_doc_ext' => false,
            'ind_ctas_adic' => true,
            'ind_reng_adic' => false,
            'ind_detcomp_adic' => false]
        );
        foreach ($defs as $def) {
            Defeventosasyc::create($def);
        }
    }

}
