<?php

class MemosController extends BaseController
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getIndex(){
        $data['memos'] = Memo::all();
        return View::make('memorandum.listamemo',$data);
    }

    public function getVer($id) {
        $data['memo'] = Memo::findOrFail($id);
        return View::make('memorandum.memo', $data);
    }
    
    public function getImprimir($id, $store = false) {
      require_once(app_path('/ayudantes/report/html2pdf.class.php'));
        $data['memo'] = Memo::findOrFail($id);
        //$data['personaBeneficiario'] = $data['solicitud']->personaBeneficiario;
        $pdf = new HTML2PDF('P', 'letter', 'es');
        $pdf->pdf->SetDisplayMode('fullpage');
        try {
            ob_clean();
            $html = View::make('memorandum.imprimir', $data)->render();
            $pdf->writeHTML($html);
            if ($store) {
                $pdf->Output(app_path('storage/temp/memorandum' . $id . '.pdf'), 'F');
            } else {
                $pdf->Output('memorandum.pdf');
            }
        } catch (HTML2PDF_exception $e) {
            die($e . " :(");
        }
        die();
    }
}

