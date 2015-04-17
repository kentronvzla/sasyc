<?php
/**
 * Created by PhpStorm.
 * User: Nadin Yamani
 * Date: 13/03/2015
 * Time: 03:34 PM
 */

namespace ayudantes;

class Reporte{

    public function generar($vista, $data, $orientacion = 'P'){
        if(\Input::get('formato_reporte','pdf')=="pdf"){
            return $this->generarPDF($vista, $data, $orientacion);
        }

        return $this->generarExcel($vista, $data);
    
    }

    private function generarExcel($vista, $data){
        \Excel::create($vista, function($excel) use ($vista, $data) {
            $excel->sheet('Hoja 1', function($sheet) use ($vista, $data) {
                $sheet->loadView($vista, $data);
            });
        })->download('xls');
    }

    private function generarPDF($vista, $data, $orientacion){
        require_once(app_path('/ayudantes/report/html2pdf.class.php'));
        $pdf = new \HTML2PDF($orientacion, 'letter', 'es');
        $pdf->pdf->SetDisplayMode('fullpage');
        try {
            ob_clean();
            $html = \View::make($vista, $data)->render();
            $pdf->writeHTML($html);
            $pdf->Output($vista.'.pdf');
        } catch (\HTML2PDF_exception $e) {
            die($e . " :(");
        }
        die();
    }

}