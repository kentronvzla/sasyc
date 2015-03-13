<?php

class SolicitudesController extends BaseController {

    private $reporte;

    public function __construct(\ayudantes\Reporte $rep) {
        $this->reporte = $rep;
        parent::__construct();
    }

    public function getVer($id) {
        $data['solicitud'] = Solicitud::findOrFail($id);
        $data['beneficiario'] = $data['solicitud']->getBeneficiario();
        $data['solicitante'] = $data['solicitud']->getSolicitante();
        return View::make('solicitudes.planilla', $data);
    }

    public function getIndex() {
        $data['solicitudes'] = Solicitud::eagerLoad()
            ->aplicarFiltro(Input::all())
            ->ordenar();
        if (Input::has('asignar')) {
            $data['campo'] = Input::get('asignar');
            $data['solicitud'] = new Solicitud();
            if($data['campo']=='usuario'){
                $usuario = Usuario::getLogged();
                $data['solicitudes']->aplicarFiltro(['departamento_id'=>$usuario->departamento_id]);
                $data['analistas'] = $usuario->getCompaneros();
            }
        } else if(Input::has('anulando')){
            $data['anulando'] = true;
        } else if(Input::has('cerrar')){
            $data['cerrar'] = true;
        } else if(Input::has('solo_asignadas')){
            $data['solo_asignadas'] = true;
        }
        $data['solicitudes'] = $data['solicitudes']->paginate(10);
        //se usa para el helper de busqueda
        $data['persona'] = new Persona();
        $data['solicitud'] = new Solicitud();
        $data['presupuesto'] = new Presupuesto();
        return View::make('solicitudes.index', $data);
    }

    public function postModificar() {
        Session::forget('solicitud');
        $solicitud = Solicitud::findOrNew(Input::get('id'));
        $solicitud->fill(Input::all());
        if(Input::has('informe')){
            $solicitud->reglasInforme();
        }
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
        if(!$data['solicitud']->puedeModificar()){
            return Redirect::to('solicitudes')->with('error','Solo se pueden editar solicitudes en Elaboración');
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
        $data['solicitud'] = Solicitud::findOrFail($id);
        $data['beneficiario'] = $data['solicitud']->getBeneficiario();
        $data['solicitante'] = $data['solicitud']->getSolicitante();
        return $this->reporte->generar('solicitudes.imprimir', $data);
    }

    public function getVermemo($id) {
        $data['solicitud'] = Solicitud::findOrFail($id);
        $data['personaBeneficiario'] = $data['solicitud']->personaBeneficiario;
        return View::make('memorandun.memorandun',$data);
    }

    public function getMemo($id, $store = false) {
        $data['solicitud'] = Solicitud::findOrFail($id);
        $data['personaBeneficiario'] = $data['solicitud']->personaBeneficiario;
        return $this->reporte->generar('memorandum.imprimir', $data);
    }

    public function getAceptarasignacion($id){
        $data['solicitud'] = Solicitud::findOrFail($id);
        $data['manual'] = Configuracion::get('ind_secuencia_automatica')=="No";
        $data['solicitud']->configurarPresupuesto("", false);
        return View::make('solicitudes.aceptarasignacion',$data);
    }

    public function postAceptarasignacion(){
        $solicitud = Solicitud::findOrFail(Input::get('id'));
        if($solicitud->aceptarAsignacion(Input::get('num_proc'))){
            return Redirect::to('solicitudes/modificar/'.$solicitud->id)->with('mensaje', 'Se aceptó la asignación de la solicitud: '.$solicitud->id.', correctamente');
        }
        return Redirect::to('solicitudes?solo_asignadas=true')->with('error', $solicitud->getErrors()->first());
    }

    public function getDevolverasignacion($id){
        $data['solicitud'] = Solicitud::findOrFail($id);
        return View::make('solicitudes.devolverasignacion',$data);
    }

    public function postDevolverasignacion(){
        $solicitud = Solicitud::findOrFail(Input::get('id'));
        if($solicitud->devolverAsignacion()){
            return Redirect::to('solicitudes?solo_asignadas=true')->with('mensaje', 'Se devolvió la asignación de la solicitud: '.$solicitud->id.', correctamente');
        }
        return Redirect::to('solicitudes?solo_asignadas=true')->with('error', $solicitud->getErrors()->first());
    }

    public function getSolicitaraprobacion($id){
        $data['solicitud'] = Solicitud::findOrFail($id);
        return View::make('solicitudes.solicitaraprobacion',$data);
    }

    public function postSolicitaraprobacion(){
        $solicitud = Solicitud::findOrFail(Input::get('id'));
        if($solicitud->solicitarAprobacion(Input::get('usuario_autorizacion_id'))){
            return Response::json(['mensaje'=>'Se solicitó la aprobación de la solicitud: '.$solicitud->id.', correctamente']);
        }
        return Response::json(['errores'=>$solicitud->getErrors()], 400);
    }

    public function getAnular ($id){
        $data['solicitud'] = Solicitud::findOrFail($id);
        $data['bitacora'] = new Bitacora();
        return View::make('solicitudes.anular',$data);
    }

    public function postAnular (){
        $solicitud = Solicitud::findOrFail(Input::get('id'));
        if($solicitud->anular(Input::get('nota'))){
            return Redirect::to('solicitudes')->with('mensaje', 'Se anuló la solicitud: '.$solicitud->id.', correctamente');
        }
        return Redirect::to('solicitudes?estatus[]=ELA&estatus[]=REF&estatus[]=PEN&estatus[]=ACP&anulando=true')->with('error', $solicitud->getErrors()->first());
    }

    public function getCerrar ($id){
        $data['solicitud'] = Solicitud::findOrFail($id);
        $data['bitacora'] = new Bitacora();
        return View::make('solicitudes.cerrar',$data);

    }

    public function postCerrar (){
        $solicitud = Solicitud::findOrFail(Input::get('id'));
        if($solicitud->cerrar()){
            return Redirect::to('solicitudes')->with('mensaje', 'Se cerro la solicitud: '.$solicitud->id.', correctamente');
        }
        return Redirect::to('solicitudes?estatus[]=ELA&estatus[]=REF&estatus[]=PEN&estatus[]=ACP&cerrar=true')->with('error', $solicitud->getErrors()->first());
    }


    public function getBitacora($id, $store = false) {
        $data['solicitud'] = Solicitud::findOrFail($id);
        return $this->reporte->generar('solicitudes.imprimirbitacora', $data);
    }

    public function getInforme($id, $store = false) {
        $data['solicitud'] = Solicitud::findOrFail($id);
        return $this->reporte->generar('solicitudes.imprimirinforme', $data);
    }
    /* -------------------------------------- */
}
