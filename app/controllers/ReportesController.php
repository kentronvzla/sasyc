<?php

class ReportesController extends BaseController {

    private static $columnas_agrupables = [
        ''=>'Seleccione',
        'municipios.estado_id'=>'Estado',
        'areas.tipo_ayuda_id'=>'Tipo de ayuda',
        'solicitudes.area_id'=>'Área',
        'presupuestos.beneficiario_id'=>'Beneficiario',
        'presupuestos.requerimiento_id'=>'Requerimiento',
        'solicitudes.estatus'=>'Estatus',
        'solicitudes.recepcion_id'=>'Recepción',
        'personas.sexo'=>'Sexo',
        'especial_mes'=>'Mes',
    ];

    public function __construct() {
        require_once(app_path('/ayudantes/report/html2pdf.class.php'));
        parent::__construct();
    }
   
    public function getEstadisticassolicitud(){
        $data['columnas_agrupables'] = static::$columnas_agrupables;
        $data['solicitud'] = new Solicitud();
        $data['persona'] = new Persona();
        return View::make('reportes.estadisticassolicitud',$data);
    }

    public function postEstadisticassolicitud(){
        $data['cont'] = 0;
        $data['acum'] = 0;
        $data['anterior'] = "";
        $data['cantReportes'] = count(Input::get('group_by_1'));
        for($i=0;$i<$data['cantReportes'];$i++) {
            $data['titulo'][$i] = Input::get('titulo_reporte')[$i];
            $data['solicitudes'][$i] = Solicitud::aplicarFiltro(Input::except(['group_by_1', 'group_by_2', 'group_by_3','titulo_reporte']));
            $data['columnas'][$i]  = [];
            $strSelect = '';
            //se aplican los group by
            for ($j = 1; $j <= 3; $j++) {
                $columna = Input::get('group_by_' . $j, '')[$i];
                if (!empty($columna)) {
                    if($columna=='especial_mes'){
                        $strSelect .= 'extract(month from solicitudes.created_at) as especial_mes, ';
                    }else{
                        $strSelect .= $columna . ', ';
                    }
                    $data['columnas'][$i][$columna] = static::$columnas_agrupables[$columna];
                    $data['solicitudes'][$i] ->groupBy($columna);
                    $data['solicitudes'][$i] ->orderBy($columna);
                    //se debe ordenar por la primera columna.
                    if ($j == 1) {
                        if(str_contains($columna,'.')){
                            $data['primera_columna'][$i] = explode('.', $columna)[1];
                        }else{
                            $data['primera_columna'][$i] = $columna;
                        }
                    }
                }
            }
            $data['solicitudes'][$i] = $data['solicitudes'][$i]
                ->selectRaw($strSelect . 'SUM(presupuestos.monto) as monto, COUNT(distinct solicitudes.id) as cantidad')
                ->get();
        }
        $pdf = new HTML2PDF('L', 'letter', 'es');
        $pdf->pdf->SetDisplayMode('fullpage');
        try {
            ob_clean();
            $html = View::make('reportes.pdf.estadisticassolicitud', $data)->render();
            $pdf->writeHTML($html);
            $pdf->Output('estadisticassolicitud.pdf');
        } catch (HTML2PDF_exception $e) {
            die($e . " :(");
        }
        die();
    }
    
    
    public function getResueltos (){
        $data['columnas_agrupables'] = static::$columnas_agrupables;
        $data['solicitud'] = new Solicitud();
        $data['persona'] = new Persona();
        return View::make('reportes.resueltos',$data);
        
    }
    
    public function postResueltos(){
        $data['solicitudes'] = Solicitud::aplicarFiltro(Input::all());
       
        $data['solicitudes'] = $data['solicitudes']->get();
        $pdf = new HTML2PDF('L', 'letter', 'es');
        $pdf->pdf->SetDisplayMode('fullpage');
        try {
            ob_clean();
            $html = View::make('reportes.pdf.resueltos', $data)->render();
            $pdf->writeHTML($html);
            $pdf->Output('resueltos.pdf');
        } catch (HTML2PDF_exception $e) {
            die($e . " :(");
        }
        die();
        
    }
    
}
