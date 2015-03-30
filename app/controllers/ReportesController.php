<?php

class ReportesController extends BaseController {

    private $reporte;
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
    private static $columnas_orden = [
        '' => 'Seleccione',
        'solicitudes.referente_externo' => 'Referencia',
        //'requerimiento.nombre'=>'Tratamiento',
    ];
    
    private static $columnas_orden_1 = [
        '' => 'Seleccione',
        'solicitudes.referente_externo' => 'Referencia',
        'solicitudes.estatus' => 'Estatus',
        //'requerimientos.nombre' => 'Tratamiento',
    ];


    public function __construct(\ayudantes\Reporte $reporte) {
        require_once '../public/EnLetras.php';
        $this->reporte = $reporte;
        parent::__construct();
    }

    public function getEstadisticassolicitud() {
        $data['columnas_agrupables'] = static::$columnas_agrupables;
        $data['solicitud'] = new Solicitud();
        $data['persona'] = new Persona();
        $data['presupuesto'] = new Presupuesto();
        return View::make('reportes.estadisticassolicitud', $data);
    }

    public function postEstadisticassolicitud() {
        $data['cont'] = 0;
        $data['acum'] = 0;
        $data['anterior'] = "";
        $data['cantReportes'] = count(Input::get('group_by_1'));
        for ($i = 0; $i < $data['cantReportes']; $i++) {
            $data['titulo'][$i] = Input::get('titulo_reporte')[$i];

            $data['solicitudes'][$i] = Solicitud::aplicarFiltro(Input::except(['group_by_1', 'group_by_2', 'group_by_3', 'titulo_reporte', 'formato_reporte']));
            $data['columnas'][$i] = [];
            $strSelect = '';
            //se aplican los group by
            for ($j = 1; $j <= 3; $j++) {
                $columna = Input::get('group_by_' . $j, '')[$i];
                if (!empty($columna)) {
                    if ($columna == 'especial_mes') {
                        $strSelect .= 'extract(month from solicitudes.created_at) as especial_mes, ';
                    } else {
                        $strSelect .= $columna . ', ';
                    }
                    $data['columnas'][$i][$columna] = static::$columnas_agrupables[$columna];
                    $data['solicitudes'][$i]->groupBy($columna);
                    $data['solicitudes'][$i]->orderBy($columna);
                    //se debe ordenar por la primera columna.
                    if ($j == 1) {
                        if (str_contains($columna, '.')) {
                            $data['primera_columna'][$i] = explode('.', $columna)[1];
                        } else {
                            $data['primera_columna'][$i] = $columna;
                        }
                    }
                }
            }
            $data['solicitudes'][$i] = $data['solicitudes'][$i]
                    ->selectRaw($strSelect . 'SUM(presupuestos.monto) as monto, COUNT(distinct solicitudes.id) as cantidad')
                    ->get();
        }
        return $this->reporte->generar('reportes.html.estadisticassolicitud', $data, 'L');
    }

    public function getResueltos() {
        $data['columnas_orden'] = static::$columnas_orden;
        $data['solicitud'] = new Solicitud();
        $data['persona'] = new Persona();
        $data['presupuesto'] = new Presupuesto();
        return View::make('reportes.resueltos', $data);
    }

    public function postResueltos() {
        $columna = Input::get('order_by');
        $data['total']= 0;
        $data['anterior'] = "";
        $data['cantReportes'] = count(Input::get('order_by'));
        $data['solicitudes'] = Solicitud::aplicarFiltro(Input::except('formato_reporte', 'order_by'));
        $data['solicitudes'] = $data['solicitudes']
                ->where(function($query) {
                    //$query->where('estatus', '=', 'ELA')->orWhere('estatus', '=', 'ART');
                    $query->where('estatus', '=', 'APR');
                })
                ->orderBy($columna, 'ASC')
                ->get();
        
        $data['parametro']=$this->parametro_de_orden($data,(explode('.', $columna)[1]));
                
        return $this->reporte->generar('reportes.html.resueltos', $data, 'L');
        //echo $columna;            
    }

    public function getPendientes (){
        
      $data['columnas_orden'] = static::$columnas_orden_1;
      $data['solicitud'] = new Solicitud();
      $data['persona'] = new Persona();
      $data['presupuesto'] = new Presupuesto();
      return View::make('reportes.pendientes',$data);

      }

      public function postPendientes(){
      $columna = Input::get('order_by');
      $data['total']= 0;
      $data['cantReportes'] = count(Input::get('order_by'));
      $data['solicitudes'] = Solicitud::aplicarFiltro(Input::except('formato_reporte', 'order_by'));
      $data['solicitudes'] = $data['solicitudes']
              /*->where(function($query) {
                    $query->where('estatus', '=', 'ELA')->orWhere('estatus', '=', 'ART');
                    //$query->where('estatus', '=', 'APR');
                })*/
      ->orderBy($columna, 'ASC')
      ->get();
      $data['parametro']=$this->parametro_de_orden($data,(explode('.', $columna)[1]));

      return $this->reporte->generar('reportes.html.pendientes', $data, 'L');
      
     
      } 
      
    public function getPuntomemo ($id){
        $total=0;
        $data['solicitud'] = Solicitud::findOrFail($id);    
        foreach($data['solicitud'] ->presupuestos as $resultado){
          $total=$total+$resultado->monto;  
        }
        // se transforma la edad del beneficiario y solicitante
        $data['edadS']=(((int)$data['solicitud']->personaSolicitante->fecha_nacimiento
           ->format('Y'))-((int)\Carbon\Carbon::now()->format('Y')))*(-1);
        $data['edadB']=(((int)$data['solicitud']->personaBeneficiario->fecha_nacimiento
           ->format('Y'))-((int)\Carbon\Carbon::now()->format('Y')))*(-1);
        
        // se convierte el monto a valor en letra
        $V=new EnLetras();
        $valor=explode(".",$total);
        if (count($valor)>1){
        $con=strtoupper($V->ValorEnLetras($valor[0]," Bsf Con "));
        $data['montoASCII']=$con.strtoupper($V->ValorEnLetras($valor[1]," Centimos"))." ( Bsf. ".$total." )";
        } 
        else {
            $data['montoASCII']=strtoupper($V->ValorEnLetras($valor[0]," Bsf"))." ( Bsf. ".$total." )";
        }
        
        // se pide el reporte
        if ($data['solicitud']->tipo_proc=='prb1'){
             return $this->reporte->generar('reportes.html.punto', $data, 'P');
         }
         elseif ($data['solicitud']->tipo_proc=='prb2') {
             return $this->reporte->generar('reportes.html.memo', $data, 'P');
         }
        
        //echo $total."<br>".$data['montoASCII'];
    }  
    
    //-------------------------------------------------------------------------------------
     
    
   /* private function edad ($edad){
         if ($edad != null or $edad!=" " or $edad!=""){
             return true;
         }
         if ($edad == null or $edad==" " or $edad!=""){
             return false;
         }
     }*/
     
    private function parametro_de_orden ($data, $columna){
         $contador=0; 
         $arreglo []=array();
        foreach ( $data['solicitudes'] as $resultado){
          foreach ($resultado->presupuestos as $key=>$presupuesto){ 
             if ($columna=="referente_externo"){
                 $arreglo[$contador]= $presupuesto->solicitud->referente_externo; 
             } 
             if ($columna=="estatus"){
                 $arreglo[$contador]= $presupuesto->solicitud->estatus;
             }
              if ($columna=="nombre"){
                 $arreglo[$contador]= $presupuesto->solicitud->requerimiento;
             }
             $contador++;
          }
        }
        return $arreglo;
    } 
              
}
