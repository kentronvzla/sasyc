<?php

class ReportesController extends BaseController {

    public function __construct() {
        require_once(app_path('/ayudantes/report/html2pdf.class.php'));
        parent::__construct();
    }

    public function getEstadisticassolicitud(){
        $data['columnas_agrupables'] = [
            ''=>'Seleccione',
            'municipios.estado_id'=>'Estado',
            'areas.tipo_ayuda_id'=>'Tipo de ayuda',
            'solicitudes.area_id'=>'Área',
            'presupuestos.beneficiario_id'=>'Beneficiario',
            'presupuestos.requirimiento_id'=>'Requerimiento',
        ];
        $data['solicitud'] = new Solicitud();
        $data['persona'] = new Persona();
        return View::make('reportes.estadisticassolicitud',$data);
    }

    public function postEstadisticassolicitud(){
        $data['solicitudes'] = Solicitud::aplicarFiltro(Input::except(['group_by_1','group_by_2','group_by_3']));
        $data['columnas'] = [];
        $strSelect = '';
        //se aplican los group by
        for($i=1;$i<=3;$i++){
            $columna = Input::get('group_by_'.$i,'')[0];
            if(!empty($columna)){
                $data['solicitudes']->groupBy($columna);
                $data['columnas'][] = $columna;
                $strSelect .= $columna.', ';
            }
        }
        $data['solicitudes'] = $data['solicitudes']
            ->selectRaw($strSelect.'SUM(presupuestos.monto) as monto, COUNT(distinct solicitudes.id) as cantidad')
            ->get();
        $pdf = new HTML2PDF('P', 'letter', 'es');
        $pdf->pdf->SetDisplayMode('fullpage');
        try {
            ob_clean();
            $html = View::make('reportes.pdf.estadisticassolicitud', $data)->render();
            $pdf->writeHTML($html);
            $pdf->Output('estadisticassolicitud.pdf');
        } catch (HTML2PDF_exception $e) {
            die($e . " :(");
        }
    }



}
