<?php

class TenenciaTableSeeder extends Seeder {

    public function run() {
        $tenencias = array('Propia',  
            'Alquilada',	 
            'Cuido',  
            'Alojada',	 
            'Propia Pagando',  
            'Cedida',  
            'Invadida');
        foreach ($tenencias as $tenencia) {
            Tenencia::create(array('nombre' => $tenencia));
        }
    }

}
