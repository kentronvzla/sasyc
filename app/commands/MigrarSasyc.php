<?php

use Illuminate\Console\Command;

class MigrarSasyc extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'migrar:sasyc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando que migra sasyc viejo a la nueva version';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire() {
        ini_set('max_execution_time',999999999);
        $this->resetearBD();
        DB::setDefaultConnection('migracion_sasyc');
        //Se inicia sesion, es requerido en algunos eventos..
        Sentry::login(Sentry::findUserById(1));
        $this->cargarTablaNivelInstruccion();
        $this->cargarTablaParentescos('personas_sasyc');
        $this->cargarTablaParentescos('personas_familia');
        $this->migrarPersonas();
        /*$this->migrarFamiliares();
        $this->migrarRequerimientos();
        $this->migrarAreas();
        $this->migrarRecaudos();
        $this->migrarRecepciones();
        $this->migrarSolicitudes();
        $this->migrarInformeSocioEconomico();
        $this->migrarBitacora();
        $this->migrarRecaudosSolicitud();
        $this->migrarPresupuestos();*/
    }

    private function resetearBD(){
        $db_final = Config::get('database.connections.migracion_sasyc.database');
        $this->info("Verificando si sasyc_migracion existe");
        $existe = DB::select("SELECT 1 FROM pg_database WHERE datname = '$db_final'");
        if(!empty($existe)){
            $this->info("Borrando base de datos ".$db_final);
            DB::statement('DROP DATABASE '.$db_final);
        }
        $this->info("Cerrando conexion con la BD");
        DB::disconnect('sasyc_migracion');
        DB::disconnect('pgsql');
        $this->info("Creando base de datos ".$db_final);
        DB::statement('CREATE DATABASE '.$db_final);
        $this->info("Corriendo archivos de migrations y seeds");
        $this->call('migrate', ['--database' => 'migracion_sasyc']);
        $this->call('db:seed', ['--database'=>'migracion_sasyc']);

    }

    private function cargarTablaNivelInstruccion(){
        //Se buscan los distintos niveles de instruccion en el sasyc viejo...
        $this->info("Migrando Niveles academicos");
        $niveles = DB::connection('sasyc_viejo')->table('personas_sasyc')->distinct()->select('nivelinstruccion')->get();
        foreach($niveles as $key=>$nivel){
            $existe = NivelAcademico::where('nombre','ILIKE',$nivel->nivelinstruccion)->count();
            if($existe==0){
                $this->info("Creando ".$nivel->nivelinstruccion);
                $nivelNuevo = new NivelAcademico();
                $nivelNuevo->desabilitarValidaciones();
                $nivelNuevo->nombre = $nivel->nivelinstruccion;
                $nivelNuevo->orden = $key;
                $nivelNuevo->save();
            }
        }
    }

    private function cargarTablaParentescos($origen){
        //Se buscan los distintos parentescos en el sasyc viejo...
        $this->info("Migrando parentescos");
        $parentescos = DB::connection('sasyc_viejo')->table($origen)->distinct()->select('parentesco')->get();
        foreach($parentescos as $key=>$parentesco){
            $existe = Parentesco::where('nombre','ILIKE',$parentesco->parentesco)->count();
            if($existe==0){
                $this->info("Creando ".$parentesco->parentesco);
                Parentesco::create(['nombre'=>$parentesco->parentesco,'inverso'=>'No Aplica']);
            }
        }
    }

    private function migrarPersonas(){
        $arrEstadoCivil = [
            ''=>null,
            'S'=>1,
            'D'=>4,
            'C'=>2,
            'O'=>5,
            'V'=>3,
        ];
        $nacionalidades = [
            'E'=>2,
            'V'=>1,
            ''=>1,
        ];
        $this->info("Migrando personas");
        $this->getTable('personas_sasyc')->chunk(1000, function($personas) use ($nacionalidades, $arrEstadoCivil){
            foreach($personas as $persona){
                $personaNueva = new Persona();
                //Esto es importante, como estamos forzando el id la concurrencia da error....
                $personaNueva->desabilitarConcurrencia();
                $personaNueva->desabilitarValidaciones();
                $personaNueva->id = $persona->idpersona;
                $personaNueva->nombre = $persona->nombre;
                $personaNueva->apellido = $persona->apellido;
                $personaNueva->tipo_nacionalidad_id = $nacionalidades[$persona->nacionalidad];
                $personaNueva->ci = $persona->ci;
                $personaNueva->sexo = $persona->sexo;
                $personaNueva->estado_civil_id = $arrEstadoCivil[$persona->estadocivil];
                $personaNueva->lugar_nacimiento = $persona->lugarnacimiento;
                if($persona->fecnacimiento!=''){
                    $carbon = new Carbon($persona->fecnacimiento);
                    $personaNueva->fecha_nacimiento = $carbon->format('d/m/Y');
                }
                $personaNueva->nivelAcademico()->associate(NivelAcademico::where('nombre','ILIKE',$persona->nivelinstruccion)->first());
                $personaNueva->zona_sector = $persona->zonasector;
                $personaNueva->calle_avenida = $persona->calleavenida;
                $personaNueva->apto_casa = $persona->aptocasa;
                $personaNueva->telefono_fijo = $persona->telefono;
                $personaNueva->telefono_celular = $persona->celular;
                $personaNueva->telefono_otro = $persona->telefotros;
                $personaNueva->ind_trabaja = $persona->trabaja == 'S';
                $personaNueva->ocupacion = $persona->ocupacion;
                $personaNueva->ingreso_mensual = $persona->ingresomensual;
                $personaNueva->observaciones = $persona->observaciones;
                $personaNueva->ind_asegurado = $persona->asegurado == 'S';
                $personaNueva->seguro_id = $persona->empresaseguro;
                $personaNueva->cobertura = $persona->cobertura;
                $personaNueva->otro_apoyo = $persona->otroapoyo;
                $personaNueva->save();
                $this->info("Persona ".$persona->ci." se migro correctamente");
            }
        });
    }

    private function migrarFamiliares(){
        $this->info("Migrando familiares");
        $this->getTable('personas_familia')->chunk(1000, function($parientes){
            foreach($parientes as $pariente){
                $this->info("Migrando ".$pariente->idbeneficiario.'->'.$pariente->idfamiliar);
                $parentesco = Parentesco::where('nombre','ILIKE',$pariente->parentesco)->first();
                $insert = [
                    'persona_beneficiario_id'=>$pariente->idbeneficiario,
                    'persona_familia_id'=>$pariente->idfamiliar,
                    'parentesco_id'=>$parentesco->id,
                    'created_at'=> new Carbon(),
                    'updated_at'=>new Carbon(),
                ];
                DB::table('familia_persona')->insert($insert);
            }
        });
    }

    private function migrarRequerimientos(){
        $this->info("Migrando requerimientos");
        $this->getTable('requerimientos')->chunk(1000, function($requerimientos){
            foreach($requerimientos as $requerimiento){
                $this->info("Migrando requerimiento: ".$requerimiento->codrequerimiento);
                $requerimientoNuevo = new Requerimiento();
                $requerimientoNuevo->desabilitarValidaciones();
                $requerimientoNuevo->desabilitarConcurrencia();
                $requerimientoNuevo->id = $requerimiento->codrequerimiento;
                $requerimientoNuevo->nombre = $requerimiento->nombrequerimiento;
                $requerimientoNuevo->cod_item = $requerimiento->coditem;
                $requerimientoNuevo->cod_cta = $requerimiento->codcta;
                $requerimientoNuevo->descripcion = $requerimiento->descrequerimiento;
                $requerimientoNuevo->tipo_requerimiento_id = $requerimiento->tipo=='M' ? 2:1;
                $requerimientoNuevo->tipo_ayuda_id = $requerimiento->codplancaso =='MED' ? 1:2;
                $requerimientoNuevo->save();
                $this->info("Requerimiento ".$requerimientoNuevo->nombre.' migrado');
            }
        });
    }

    private function migrarAreas(){
        $this->info("Migrando areas");
        $this->getTable('especialidad')->chunk(1000, function($areas){
            foreach($areas as $area){
                $this->info("Migrando area: ".$area->codespecialidad);
                $areaNueva = new Area();
                $areaNueva->desabilitarConcurrencia();
                $areaNueva->desabilitarValidaciones();
                $areaNueva->id = $area->codespecialidad;
                $areaNueva->nombre = $area->nombespecialidad;
                $areaNueva->descripcion = $area->descespecialidad;
                $areaNueva->tipo_ayuda_id = 1;
                $areaNueva->save();
            }
        });
    }

    private function migrarRecaudos(){
        $this->info("Migrando recaudos");
        $this->getTable('recaudos_sasyc')->chunk(1000, function($recaudos){
            foreach($recaudos as $recaudo){
                $this->info("Migrando recaudo: ".$recaudo->codrecaudo);
                $recaudoNuevo = new Recaudo();
                $recaudoNuevo->desabilitarConcurrencia();
                $recaudoNuevo->desabilitarValidaciones();
                $recaudoNuevo->id = $recaudo->codrecaudo;
                $recaudoNuevo->nombre = $recaudo->nombrecaudo;
                $recaudoNuevo->descripcion = $recaudo->descrecaudo;
                $recaudoNuevo->ind_activo = $recaudo->indactivo == 'S';
                $recaudoNuevo->ind_vence = $recaudo->indvence == 'S';
                $recaudoNuevo->ind_obligatorio = $recaudo->indobligatorio == 'S';
                $recaudoNuevo->save();
            }
        });
    }

    private function migrarRecepciones(){
        $this->info("Migrando recepciones");
        $this->getTable('referencias')->chunk(1000, function($recepciones){
            foreach($recepciones as $recepcion){
                $this->info("Migrando recepcion: ".$recepcion->codreferidopor);
                $recepcionNueva = new Recepcion();
                $recepcionNueva->desabilitarConcurrencia();
                $recepcionNueva->desabilitarValidaciones();
                $recepcionNueva->id = $recepcion->codreferidopor;
                $recepcionNueva->nombre = $recepcion->nombre;
                $recepcionNueva->save();
            }
        });
    }

    private function migrarSolicitudes(){
        $arrayEstatus = [
            'APR'=>'APR',
            'ANU'=>'ANU',
            'ACP'=>'ACA',
            'CER'=>'CER',
            'PEN'=>'ELA',
        ];
        $this->info("Migrando solicitudes");
        $this->getTable('referencias')->chunk(1000, function($solicitudes) use ($arrayEstatus){
            foreach($solicitudes as $solicitud){
                $this->info("Migrando solicitud: ".$solicitud->numsol);
                $solicitudNueva = new Solicitud();
                $solicitudNueva->desabilitarConcurrencia();
                $solicitudNueva->desabilitarValidaciones();
                $solicitudNueva->id = $solicitud->idsolicitud;
                $solicitudNueva->created_at = new \Carbon\Carbon($solicitud->fecsol);
                $solicitudNueva->descripcion = $solicitud->desccaso;
                $solicitudNueva->referente_id = 1;
                $solicitudNueva->recepcion_id = $solicitud->codreferidopor;
                $solicitudNueva->num_solicitud = $solicitud->numsol;
                $solicitudNueva->ind_mismo_benef = $solicitud->indmismobenef=='S';
                $solicitudNueva->persona_beneficiario_id = $solicitud->idbeneficiario;
                $solicitudNueva->persona_solicitante_id = $solicitud->idsolicitante;
                $solicitudNueva->observaciones = $solicitud->observaciones;
                if($solicitud->fecasignacion!=''){
                    $carbon = new Carbon($solicitud->fecasignacion);
                    $solicitudNueva->fecha_asignacion = $carbon->format('d/m/Y');
                    $solicitudNueva->usuario_asignacion_id = 1;
                }
                $solicitudNueva->ind_inmediata = $solicitud->prioridad > 0;
                $solicitudNueva->estatus = $arrayEstatus[$solicitud->stssolicitud];
                if($solicitud->fecapr!=''){
                    $carbon = new Carbon($solicitud->fecapr);
                    $solicitudNueva->fecha_aprobacion = $carbon->format('d/m/Y');
                    $solicitudNueva->usuario_autorizacion_id = 1;
                }
                $solicitudNueva->area_id = $solicitud->codespecialidad;
                $solicitudNueva->necesidad = $solicitud->diagnostico;
                $solicitudNueva->organismo_id = 1;
                $solicitudNueva->tipo_proc = $solicitud->tipoproc;
                $solicitudNueva->num_proc = $solicitud->numproc;
                if($solicitud->fecacp!=''){
                    $carbon = new Carbon($solicitud->fecacp);
                    $solicitudNueva->fecha_aceptacion = $carbon->format('d/m/Y');
                }
                $solicitudNueva->moneda = $solicitud->codmoneda;
                if($solicitud->feccierre!=''){
                    $carbon = new Carbon($solicitud->feccierre);
                    $solicitudNueva->fecha_cierre = $carbon->format('d/m/Y');
                }
                $solicitudNueva->save();
            }
        });
    }

    private function migrarInformeSocioEconomico(){
        $tipos = [
            'Q'=>1,
            'A'=>2,
            'H'=>3,
            'C'=>4,
            'R'=>5,
            'O'=>6,
        ];
        $tenencias = [
            'P'=>1,
            'A'=>2,
            'D'=>3,
            'L'=>4,
            'O'=>5,
            'C'=>6,
            'I'=>7,
        ];
        $this->info("Migrando informes socio economicos");
        $this->getTable('inf_social')->chunk(1000, function($informes) use ($tipos, $tenencias){
            foreach($informes as $informe){
                $this->info("Migrando informe de la solicitud: ".$informe->idsolicitud);
                $solicitud = Solicitud::findOrFail($informe->idsolicitud);
                $solicitud->desabilitarConcurrencia();
                $solicitud->desabilitarValidaciones();
                $solicitud->tipo_vivienda_id = $tipos[$informe->tipocasa];
                $solicitud->tenencia_id = $tenencias[$informe->tipotenencia];
                $solicitud->informe_social = $informe->observaciones;
                $solicitud->total_ingresos = tm($informe->totalingresos);
                $solicitud->save();
            }
        });
    }

    private function migrarBitacora(){
        $this->info("Migrando bitacoras de la solicitud");
        $this->getTable('bitacora_solicitud')->chunk(1000, function($bitacoras){
            foreach($bitacoras as $bitacora){
                $this->info("Migrando bitacora: ".$bitacora->idnota);
                $bitacoraNueva = new Bitacora();
                $bitacoraNueva->solicitud_id = $bitacora->idsolicitud;
                if($bitacoraNueva->fecnota!=''){
                    $carbon = new Carbon($bitacora->fecnota);
                    $bitacoraNueva->fecha = $carbon->format('d/m/Y');
                }
                $bitacoraNueva->nota = $bitacora->nota;
                $bitacoraNueva->usuario_id = 1;
                $bitacoraNueva->ind_activo = $bitacora->indactivo=='S';
                $bitacoraNueva->ind_alarma = $bitacora->indalarma=='S';
                $bitacoraNueva->save();
            }
        });
    }

    private function migrarRecaudosSolicitud(){
        $this->info("Migrando recaudos de la solicitud");
        $this->getTable('recaudos_solicitud')->chunk(1000, function($recaudos){
            foreach($recaudos as $recaudo){
                $this->info("Migrando recaudo de la solicitud: ".$recaudo->codrecaudo);
                $recaudoNuevo = new RecaudoSolicitud();
                $recaudoNuevo->recaudo_id = $recaudo->codrecaudo;
                $recaudoNuevo->solicitud_id = $recaudo->idsolicitud;
                $recaudoNuevo->ind_recibido = $recaudo->indrecibido=='S';
                if($recaudo->fecvencimiento!=''){
                    $carbon = new Carbon($recaudo->fecvencimiento);
                    $recaudoNuevo->fecha_vencimiento = $carbon->format('d/m/Y');
                }
                $recaudoNuevo->save();
            }
        });
    }

    private function migrarPresupuestos(){
        $this->info("Migrando presupuestos");
        $this->getTable('recaudos_solicitud')->chunk(1000, function($presupuestos){
            foreach($presupuestos as $presupuesto){
                $this->info("Migrando presupuesto de la solicitud: ".$presupuesto->idppto);
                $presupuestoNuevo = new Presupuesto();
                $presupuestoNuevo->solicitud_id = $presupuesto->idsolicitud;
                $presupuestoNuevo->requerimiento_id = $presupuesto->codrequerimiento;
                $presupuestoNuevo->beneficiario_id = $presupuesto->numbenef;
                $presupuestoNuevo->monto = $presupuesto->monto;
                $presupuestoNuevo->cantidad = $presupuesto->cantidad;
                $presupuestoNuevo->save();
            }
        });
    }

    private function getTable($table){
        return DB::connection('sasyc_viejo')->table($table);
    }
}
