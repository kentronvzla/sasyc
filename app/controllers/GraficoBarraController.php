<?php 

class GraficoBarraController extends Controller{
     
    
    private static $columnas_agrupables = [
        '' => 'Seleccione',
        'municipios.estado_id' => 'Estado',
        'areas.tipo_ayuda_id' => 'Tipo de ayuda',
        'solicitudes.area_id' => 'Área',
        'presupuestos.beneficiario_id' => 'Beneficiario',
        'presupuestos.requerimiento_id' => 'Requerimiento',
        'solicitudes.estatus' => 'Estatus',
        'solicitudes.recepcion_id' => 'Recepción',
        'personas.sexo' => 'Sexo',
        'especial_mes' => 'Mes',
    ];
    
    public function getGraficar() {
        //echo "control metodo getGraficar";
        return View::make('graficos.chart');
       
    }
    
    public function getFormulario() {
        $data['columnas_agrupables'] = static::$columnas_agrupables;
        $data['solicitud'] = new Solicitud();
        $data['persona'] = new Persona();
        $data['presupuesto'] = new Presupuesto();
        return View::make('graficos.estadisticagrafico', $data);
       
    }
    
    public function getDataano(){
        
        /* Ejemplo con data de DB
        $range = CarbonCarbon::now()->subDays(30);

        $stats = DB::table('orders')
          ->where('created_at', '>=', $range)
          ->groupBy('date')
          ->orderBy('date', 'ASC')
          ->get([
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as value')
          ])
          ->toJSON();
         */
        $array[0] = new \stdClass();
        $array[0]->ano = '2014';
        $array[0]->casos = 5246; 
        $array[0]->montos = 101212;         
        
        $array[1] = new \stdClass();
        $array[1]->ano = '2014';
        $array[1]->casos = 2021; 
        $array[1]->montos = 201100; 
        
        $array[2] = new \stdClass();
        $array[2]->ano = '2016';
        $array[2]->casos = 3230; 
        $array[2]->montos = 301100; 
        
        $array[3] = new \stdClass();
        $array[3]->ano = '2017';
        $array[3]->casos = 4423; 
        $array[3]->montos = 452400;          
        
        return Response::json($array);
    }

    public function getDataarea(){
        $array[0] = new \stdClass();
        $array[0]->exp = 'Cardiologia';
        $array[0]->casos = 546; 
        $array[0]->montos = 12212;                 
        $array[1] = new \stdClass();
        $array[1]->exp = 'Cirugia';
        $array[1]->casos = 221; 
        $array[1]->montos = 10100;         
        $array[2] = new \stdClass();
        $array[2]->exp = 'Dermatologia';
        $array[2]->casos = 330; 
        $array[2]->montos = 31200; 
        $array[3] = new \stdClass();
        $array[3]->exp = 'Endocrino';
        $array[3]->casos = 423; 
        $array[3]->montos = 42400;          
        $array[4] = new \stdClass();
        $array[4]->exp = 'Fisiatria';
        $array[4]->casos = 423; 
        $array[4]->montos = 52400;        
        $array[5] = new \stdClass();
        $array[5]->exp = 'Gastro';
        $array[5]->casos = 23; 
        $array[5]->montos = 2400;        
        return Response::json($array);
    }

}
