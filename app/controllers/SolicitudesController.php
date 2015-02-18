<?php

use Oracle\Presupuesto;

class SolicitudesController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function getVer($id) {
        $data['solicitud'] = Solicitud::findOrFail($id);
        return View::make('solicitudes.planilla', $data);
    }

    public function getIndex() {
        $data['solicitudes'] = Solicitud::ordenar()
                ->eagerLoad()
                ->aplicarFiltro(Input::all())
                ->paginate(30);
        if (Input::has('asignar')) {
            $data['campo'] = Input::get('asignar');
            $data['solicitud'] = new Solicitud();
        }
        else if(Input::has('anulando')){
            $data['anulando'] = true;
        }
        return View::make('solicitudes.index', $data);
    }

    public function postModificar() {
        Session::forget('solicitud');
        $solicitud = Solicitud::findOrNew(Input::get('id'));
        $solicitud->fill(Input::all());
        if ($solicitud->save()) {
            $data['solicitud'] = $solicitud;
            $data['mensaje'] = "Datos guardados correctamente";
            if (Request::ajax()) {
                return Response::json($data);
            }
            return Redirect::to('solicitudes/modificar/' . $solicitud->id);
        } else {
            if (Request::ajax()) {
                return Response::json(['errores' => $solicitud->getErrors()], 400);
            }
            return Redirect::back()->withInput()->withErrors($solicitud->getErrors());
        }
    }

    public function getModificar($id = null) {
        if (is_null($id) && !Session::has('solicitud')) {
            $data['nuevo'] = true;
        } else {
            $data['nuevo'] = false;
        }
        if (Session::has('solicitud') && is_null($id)) {
            $data['solicitud'] = new Solicitud(Session::get('solicitud'));
        } else {
            $data['solicitud'] = Solicitud::findOrFail($id);
        }
        $data['beneficiario'] = Persona::findOrFail($data['solicitud']->persona_beneficiario_id);
        $data['solicitante'] = Persona::findOrNew($data['solicitud']->persona_solicitante_id);
        $data['familiares'] = $data['beneficiario']->getFamiliares();
        $data['familiar'] = new Persona();
        $data['recaudo'] = new RecaudoSolicitud();
        $data['recaudos'] = $data['solicitud']->recaudosSolicitud;
        $data['presupuesto'] = new Presupuesto();
        $data['presupuestos'] = $data['solicitud']->presupuestos;
        $data['bitacora'] = new Bitacora();
        $data['bitacoras'] = $data['solicitud']->bitacoras;
        $data['parentesco'] = $data['beneficiario']->getParentesco($data['solicitante']->id);
        $data['foto'] = new FotoSolicitud();
        $data['fotos'] = $data['solicitud']->fotos;
        $data['beneficiario_kerux'] = new Oracle\Beneficiario();
        if (Request::ajax()) {
            return Response::json($data);
        }
        return View::make("solicitudes.plantilla", $data);
    }

    public function getNueva() {
        Session::forget('solicitud');
        $data['nuevo'] = true;
        $data['solicitud'] = new Solicitud();
        $data['personaSolicitante'] = new Persona();
        $data['personaBeneficiario'] = new Persona();
        $data['familiares'] = $data['personaSolicitante']->familiaresBeneficiario;
        $data['solicitudes'] = $data['personaSolicitante']->solicitudes;
        return View::make("solicitudes.plantilla", $data);
    }

    public function postNueva() {
        $solicitud = Solicitud::crear(Input::all());
        if (!$solicitud->hasErrors()) {
            Session::set('solicitud', $solicitud->toArray());
            return Redirect::to('solicitudes/modificar');
        } else {
            return Redirect::back()->withInput()->withErrors($solicitud->getErrors());
        }
    }

    public function postAsignar() {
        $resultado = Solicitud::asignar(Input::all());
        if ($resultado->hasErrors()) {
            return Response::json(['errores' => $resultado->getErrors()], 400);
        }
        return Response::json(['mensaje' => 'Se asignaron las solicitudes correctamente']);
    }

    /* --------------------------------------------------------------------*/

    public function getPlanilla($id, $store = false) {
        require_once(app_path('/ayudantes/report/html2pdf.class.php'));
        $data['solicitud'] = Solicitud::findOrFail($id);
        $data['personaBeneficiario'] = $data['solicitud']->personaBeneficiario;
        $pdf = new HTML2PDF('P', 'letter', 'es');
        $pdf->pdf->SetDisplayMode('fullpage');
        try {
            ob_clean();
            $html = View::make('solicitudes.imprimir', $data)->render();
            $pdf->writeHTML($html);
            if ($store) {
                $pdf->Output(app_path('storage/temp/solicitud' . $id . '.pdf'), 'F');
            } else {
                $pdf->Output('solicitud.pdf');
            }
        } catch (HTML2PDF_exception $e) {
            die($e . " :(");
        }
        die();
    }

    public function getVermemo($id) {
        $data['solicitud'] = Solicitud::findOrFail($id);
        $data['personaBeneficiario'] = $data['solicitud']->personaBeneficiario;
        return View::make('memorandun.memorandun',$data);
    }
    
    public function getMemo($id, $store = false) {
        require_once(app_path('/ayudantes/report/html2pdf.class.php'));
        $data['solicitud'] = Solicitud::findOrFail($id);
        $data['personaBeneficiario'] = $data['solicitud']->personaBeneficiario;
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
    
    public function getAnular ($id){
        $data['solicitud'] = Solicitud::findOrFail($id);

        return View::make('solicitudes.anular',$data);
    }
    
    public function postAnular (){
        
    }
    
    /* -------------------------------------- */
}
