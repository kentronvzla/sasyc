<?php // namespace Administracion\Tablas;

/**
 * Description of DocumentossasycesController
 *
 * @author Nadin Yamani
 */
class DocumentossasycesController extends BaseController {
    private $reporte;
    public function __construct(\ayudantes\Reporte $rep) {
        $this->reporte = $rep;
        parent::__construct();
    }
    
    public function getIndex(){
       $data['documentossasyces'] = Documentossasyc::paginate(5);
        return View::make('documentos.documentossasyces',$data);
    }

     public function getVer($id) {
        $data['documentossasyces'] = Documentossasyc::findOrFail($id);
        return View::make('documentos.documentossasycesform', $data);
    }
    
     public function getImprimir($id, $store = false) {
        $data['documentossasyces'] = Documentossasyc::findOrFail($id);
        return $this->reporte->generar('documentos.imprimir', $data);
    }
}