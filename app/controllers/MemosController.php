<?php

class MemosController extends BaseController 
{
    private $reporte;
    public function __construct(\ayudantes\Reporte $rep) {
        $this->reporte = $rep;
        parent::__construct();
    }
    
    public function getIndex(){
       $data['memos'] = Memo::paginate(5);
        return View::make('memorandum.listamemo',$data);
    }

    public function getVer($id) {
        $data['memos'] = Memo::findOrFail($id);
        return View::make('memorandum.memo', $data);
    }
    
    public function getImprimir($id, $store = false) {
        $data['memos'] = Memo::findOrFail($id);
        return $this->reporte->generar('memorandum.imprimir', $data);
    }
}

