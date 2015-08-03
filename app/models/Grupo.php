<?php

/**
 * Grupo
 *
 * @property integer $id
 * @property string $name
 * @property string $permissions
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Grupo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Grupo whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Grupo wherePermissions($value)
 * @method static \Illuminate\Database\Query\Builder|\Grupo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Grupo whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Grupo whereVersion($value)
 */
class Grupo extends BaseModel implements SimpleTableInterface, SelectInterface {

    protected $primaryKey = "id";

    /**
     * Tabla del modelo
     * @var string
     */
    protected $table = 'groups';

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = array('name');

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = array(
        'name' => 'required|max:100'
    );
    public static $seccionesGlobales = array(
        'GET.administracion.area-trabajo.subareas' => 'getSubareas',
    );
    public static $permisos = array(
        'Super' => array(
            'Descripcion' => 'Super Usuario.',
            'superuser' => 'Puede acceder a cualquier sección',
        ),
        'SolicitudesController' => array(
            'Descripcion' => 'Menu de Solicitudes',
            'GET.solicitudes.nueva' => 'Nueva Solicitud',
            'GET.solicitudes.ver' => 'Consultar Solicitudes',
            'GET.solicitudes.asignardepartamento' => 'Asignar Departamento',
            'GET.solicitudes.asignaranalista' => 'Asignar Analista',
            'GET.solicitudes.reasignaranalista' => 'Reasignar Analista',
            'GET.solicitudes.aceptarasignacion' => 'Aceptar Asignación',
            'GET.solicitudes.solicitaraprobacion' => 'Solicitar Aprobacion',
            'GET.solicitudes.cerrar' => 'Cerrar Solicitudes',
            'GET.solicitudes.anular' => 'Anular Solicitud',
//            'GET.solicitudes.ver' => 'Ver Solicitudes',            
//            'POST.solicitudes.modificar' => 'Guardar Solicitudes',            
//            
//            'POST.solicitudes.reasignaranalista' => 'Reasignar Analista'
//            'GET.solicitudes.planilla' => 'Ver Planilla',
//            'GET.solicitudes.vermemo' => 'Ver Memo',
//            
//            'POST.solicitudes.aceptarasignacion' => 'Guardar Asignación',
//            'GET.solicitudes.devolverasignacion' => 'Devolver Asignación',
//            'POST.solicitudes.devolverasignacion' => 'Devolver Asignacion',
//            'POST.solicitudes.solicitaraprobacion' => 'Guardar Aprobacion',
//           
//            'POST.solicitudes.anular' => 'Confirmar Anulación de Solicitud',
//            
//            'POST.solicitudes.cerrar' => 'Confirmar Cierre de Solicitud',
//            'GET.solicitudes.historial' => 'Ver Bitacora',            
//            'GET.solicitudes.bitacora' => 'Imprimir Bitacora',
//            'GET.solicitudes.informe' => 'Ver Informe',
//            'GET.solicitudes.requerimientos' => 'Consultar presupuesto',
        ),
        'ReportesController' => array(
            'Descripcion' => 'Menu de Reportes',
            'GET.reportes.resueltos' => 'Reporte de Casos Resueltos',
            'GET.reportes.pendientes' => 'Reporte de Casos Pendientes',
            'GET.reportes.estadisticassolicitud' => 'Reporte Estadistica Agrupada',
            'GET.reportes.estadisticasgrafico' => 'Graficas Estadisticas',
            'GET.reportes.puntomemo' => 'Reporte Punto Memo',
            'POST.reportes.generar' => 'Generar Reportes Excel o PDF',
        ),
        
        'DocumentossasycesController' => array(
            'Descripcion' => 'Menu de Documentos',
            'GET.documentossasyces.ver' => 'Consulta de Documentos',
        ),
        'AdministracionController' => array(
            'Descripcion' => 'Menu de Administración',
            'GET.administracion' => 'Configuración de tablas',
        ),
        'OperacionesController' => array(
            'Descripcion' => 'Operaciones de Solicitudes',
            'GET.solicitudes.modificar' => 'Modificar Solicitudes',
            'POST.solicitudes.nueva' => 'Guardar Solicitudes Nuevas',
            'POST.solicitudes.asignar' => 'Asignar Departamento/Analista/ Reasignar Analista',
        ),
        
         'PermisosController' => array(
            'Descripcion' => 'Menu para Modificar Solicitudes',
            'GET.solicitudes.modificar' => 'Solicitud',
            'GET.personas.modificar' => 'Beneficiario',
            'GET.personas.crear' => 'Solicitante',
            'GET.personas.familiar' => 'Grupo Familiar',
            'GET.solicitudes.informe' => 'Informe Socieconomico',
            'GET.recaudossolicitud.modificar' => 'Recaudos',
            'GET.presupuestos.modificar' => 'Presupuestos',
            'GET.fotossolicitud.modificar' => 'Galeria de Fotos',
        ),
        'MemosController' => array(
            'Descripcion' => 'Operaciones de Memorandums',
            'GET.memorandum.ver' => 'Consultar Memos',
            'GET.memorandum.imprimir' => 'Imprimir Memos',
        ),
        'PresupuestosController' => array(
            'Descripcion' => 'Operaciones de Presupuestos',
            'GET.presupuestos.presupuesto' => 'Consultar Presupuesto',
            'POST.presupuestos.modificar' => 'Agregar Beneficiario',
            'DELETE.presupuestos.presupuesto' => 'Borrar Presupuesto',
        ),
        'AlertasController' => array(
            'Descripcion' => 'Alarmas',
            'GET.alertas' => 'Consultar Alarmas',
        ),
//        'UsuariosController' => array(
//            'Descripcion' => 'Usuarios',
//            'POST.administracion.seguridad.usuarios' => 'Guardar Usuarios',
//            'GET.administracion.seguridad.usuarios' => 'Ver Usuarios',
//            'DELETE.administracion.seguridad.usuarios' => 'Borrar Usuarios',
//            'GET.administracion.seguridad.usuarios.modificar' => 'Modificar usuario',
//        ),
//        'GruposController' => array(
//            'Descripcion' => 'Grupos',
//            'GET.administracion.seguridad.grupos.modificar' => 'Modificar grupos',
//            'GET.administracion.seguridad.grupos' => 'Ver permisos a grupos',
//            'POST.administracion.seguridad.grupos' => 'Guardar permisos a grupos',
//            'DELETE.administracion.seguridad.grupos' => 'Borrar permisos a grupos',
//            'POST.administracion.seguridad.grupos.concederpermiso' => 'Conceder permisos a grupos',
//            'POST.administracion.seguridad.grupos.denegarpermiso' => 'Denegar permisos a grupos',            
//        ),
//        'DepartamentosController' => array(
//            'Descripcion' => 'Departamentos',
//            'GET.administracion.tablas.departamentos' => 'Ver Departamentos',
//            'POST.administracion.tablas.departamentos' => 'Guardar Departamentos',
//            'DELETE.administracion.tablas.departamentos' => 'Borrar Departamentos',
//            'GET.administracion.tablas.departamentos.modificar' => 'Modificiar Departamentos',
//        ),        
            /* 'TipoAyudasController' => array(
              'Descripcion' => 'Ayudas',
              'GET.administracion.tablas.tipoAyudas.areas' => 'Areas de ayuda',
              'GET.administracion.tablas.tipoAyudas' => 'Ver tipo de Ayudas',
              'POST.administracion.tablas.tipoAyudas' => 'Guardar tipo de Ayudas',
              'DELETE.administracion.tablas.tipoAyudas' => 'Borrar ayudas',
              'GET.administracion.tablas.tipoAyudas.modificar' => 'Modificar ayudas',
              ),
              'EstadosController' => array(
              'Descripcion' => 'Estados',
              'GET.administracion.tablas.estados.municipios' => 'Ver Municipios',
              'POST.administracion.tablas.estados' => 'Guardar Estados',
              'DELETE.administracion.tablas.estados' => 'Borrar Estados',
              'GET.administracion.tablas.estados.modificar' => 'Modificar Estados',
              ),
              'MunicipiosController' => array(
              'Descripcion' => 'Municipios',
              'GET.administracion.tablas.municipios.parroquias' => 'Ver Parroquias',
              'GET.administracion.tablas.municipios' => 'Ver Municipios',
              'POST.administracion.tablas.municipios' => 'Guardar Municipios',
              'DELETE.administracion.tablas.municipios' => 'Borrar Municipios',
              'GET.administracion.tablas.municipios.modificar' => 'Modificar Municipios',
              ),
              'AreasController' => array(
              'Descripcion' => 'Areas',
              'GET.administracion.tablas.areas' => 'Ver Areas',
              'POST.administracion.tablas.areas' => 'Guardar Areas',
              'DELETE.administracion.tablas.areas' => 'Borrar Areas',
              'GET.administracion.tablas.areas.modificar' => 'Modificar Areas',
              ),
              'ConfiguracionesController' => array(
              'Descripcion' => 'Configuraciones',
              'GET.administracion.tablas.configuraciones' => 'Ver Configuraciones',
              'POST.administracion.tablas.configuraciones' => 'Guardar Configuraciones',
              'DELETE.administracion.tablas.configuraciones' => 'Borrar configiraciones',
              'GET.administracion.tablas.configuraciones.modificar' => 'Modificar Configuraciones',
              ),
              'EstadoCivilesController' => array(
              'Descripcion' => 'Estados Civiles',
              'GET.administracion.tablas.estadoCiviles' => 'Ver Estados Civiles',
              'POST.administracion.tablas.estadoCiviles' => 'Guardar Estados Civiles',
              'DELETE.administracion.tablas.estadoCiviles' => 'Borrar Estados Civiles ',
              'GET.administracion.tablas.estadoCiviles.modificar' => 'Modificar Estados Civiles',
              ),
              'NivelAcademicosController' => array(
              'Descripcion' => 'Niveles Academicos',
              'GET.administracion.tablas.nivelAcademicos' => 'Ver Nivel Academico',
              'POST.administracion.tablas.nivelAcademicos' => 'Guardar Nivel Academicos',
              'DELETE.administracion.tablas.nivelAcademicos' => 'Borrar Niveles Academicos',
              'GET.administracion.tablas.nivelAcademicos.modificar' => 'Modificar Niveles Academicos',
              ),
              'OrganismosController' => array(
              'Descripcion' => 'Organismos',
              'GET.administracion.tablas.organismos' => 'Ver Organismos',
              'POST.administracion.tablas.organismos' => 'Guardar Organismos',
              'DELETE.administracion.tablas.organismos' => 'Borrar Organismos',
              'GET.administracion.tablas.organismos.modificar' => 'Modificar Organismos',
              ),
              'ParentescosController' => array(
              'Descripcion' => 'Paretescos',
              'GET.administracion.tablas.parentescos' => 'Ver Parentescos',
              'POST.administracion.tablas.parentescos' => 'Guardar Parestescos',
              'DELETE.administracion.tablas.parentescos' => 'Borrar Paretescos',
              'GET.administracion.tablas.parentescos.modificar' => 'Modificar Parentescos',
              ),
              'ParroquiasController' => array(
              'Descripcion' => 'Parroquias',
              'GET.administracion.tablas.parroquias' => 'Ver Parroquias',
              'POST.administracion.tablas.parroquias' => 'Guardar Parroquias',
              'DELETE.administracion.tablas.parroquias' => 'Borrar Parroquias',
              'GET.administracion.tablas.parroquias.modificar' => 'Modificar Parroquias',
              ),
              'RecaudosController' => array(
              'Descripcion' => 'Recaudos',
              'GET.administracion.tablas.recaudos' => 'Ver Recaudos',
              'POST.administracion.tablas.recaudos' => 'Guardar Recaudos',
              'DELETE.administracion.tablas.recaudos' => 'Borrar Recaudos',
              'GET.administracion.tablas.recaudos.modificar' => 'Modificar Recaudos',
              ),
              'ReferentesController' => array(
              'Descripcion' => 'Referentes',
              'GET.administracion.tablas.referentes' => 'Ver Referentes',
              'POST.administracion.tablas.referentes' => 'Guardar Referentes',
              'DELETE.administracion.tablas.referentes' => 'Borrar Referentes',
              'GET.administracion.tablas.referentes.modificar' => 'Modificar Referentes',
              ),
              'RequerimientosController' => array(
              'Descripcion' => 'Requerimientos',
              'GET.administracion.tablas.requerimientos' => 'Ver Requerimientos',
              'POST.administracion.tablas.requerimientos' => 'Guardar Requerimientos',
              'DELETE.administracion.tablas.requerimientos' => 'Borrar Requerimientos',
              'GET.administracion.tablas.requerimientos.modificar' => 'Modificar Requerimientos',
              ),
              'TenenciasController' => array(
              'Descripcion' => 'Tenencia',
              'GET.administracion.tablas.tenencias' => 'Ver Tenencias',
              'POST.administracion.tablas.tenencias' => 'Guardar Tenencias',
              'DELETE.administracion.tablas.tenencias' => 'Borrar Tenencias',
              'GET.administracion.tablas.tenencias.modificar' => 'Modificar Tenencias',
              ),
              'TipoNacionalidadesController' => array(
              'Descripcion' => 'Nacionalidades',
              'GET.administracion.tablas.tipoNacionalidades' => 'Ver Nacionalidades',
              'POST.administracion.tablas.tipoNacionalidades' => 'Guardar Nacionalidades',
              'DELETE.administracion.tablas.tipoNacionalidades' => 'Borrar Nacionalidades',
              'GET.administracion.tablas.tipoNacionalidades.modificar' => 'Modificar Nacionalidades',
              ),
              'TipoRequerimientosController' => array(
              'Descripcion' => 'Tipo de Requerimientos',
              'GET.administracion.tablas.tipoRequerimientos' => 'Ver Tipo de Requerimientos',
              'POST.administracion.tablas.tipoRequerimientos' => 'Guardar Tipo de Requerimientos',
              'DELETE.administracion.tablas.tipoRequerimientos' => 'Borrar Tipo de Requerimientos',
              'GET.administracion.tablas.tipoRequerimientos.modificar' => 'Modificar Tipo de Requerimientos',
              ),
              'TipoViviendasController' => array(
              'Descripcion' => 'Tipo de Viviendas',
              'GET.administracion.tablas.tipoViviendas' => 'Ver Tipo de Viviendas',
              'POST.administracion.tablas.tipoViviendas' => 'Guardar Tipo de Viviendas',
              'DELETE.administracion.tablas.tipoViviendas' => 'Borrar Tipo de Viviendas',
              'GET.administracion.tablas.tipoViviendas.modificar' => 'Modificar Tipo de Viviendas',
              ),
              'RecepcionesController' => array(
              'Descripcion' => 'Recepciones',
              'GET.administracion.tablas.recepciones' => 'Ver Recepciones',
              'POST.administracion.tablas.recepciones' => 'Guardar Recepciones',
              'DELETE.administracion.tablas.recepciones' => 'Borrar Recepciones',
              'GET.administracion.tablas.recepciones.modificar' => 'Modificar Recerpciones',
              ),
              'PersonasController' => array(
              'Descripcion' => 'Personas',
              'GET.administracion.tablas.personas' => 'Ver Personas',
              'POST.administracion.tablas.personas' => 'Guardar Personas',
              'DELETE.administracion.tablas.personas' => 'Borrar Personas',
              'GET.administracion.tablas.personas.modificar' => 'Modificar Personas',
              'GET.personas.buscarcne' => 'Buscar Persona en CNE',
              'GET.personas.buscarid' => 'getBuscarid',
              'GET.personas.buscar' => 'Buscar Personas',
              'POST.personas.crear' => 'Crear Personas',
              'POST.personas.modificar' => 'Modificar Personas',
              'GET.personas.familiar' => 'Ver Familiares',
              'DELETE.personas.familiar' => 'Borrar Familiares',
              'GET.personas.copiar' => 'Ver Copiar Personas',
              'GET.personas.familiaressolicitante' => 'Ver Familiares Solicitante',
              'GET.personas.solictudes-anteriores' => 'Ver Solicitudes Anteriores',
              'GET.personas.copiar-direccion' => 'Ver Copiar Direccion',
              ),
              'ProcesosController' => array(
              'Descripcion' => 'Procesos',
              'GET.administracion.tablas.procesos.proceso' => 'Obtener Procesos',
              'GET.administracion.tablas.procesos' => 'Ver Procesos',
              'POST.administracion.tablas.procesos' => 'Guardar Procesos',
              'DELETE.administracion.tablas.procesos' => 'Borrar Procesos',
              'GET.administracion.tablas.procesos.modificar' => 'Modificar Procesos',
              ),
              'AyudaCamposController' => array(
              'Descripcion' => 'Campos de Ayudas',
              'GET.administracion.tablas.ayudaCampos.todas' => 'Ver todos los Campos',
              'POST.administracion.tablas.ayudaCampos.crear' => 'Crear',
              'GET.administracion.tablas.ayudaCampos' => 'Ver Ayudas',
              'POST.administracion.tablas.ayudaCampos' => 'Guardar Ayudas',
              'DELETE.administracion.tablas.ayudaCampos' => 'Borrar Ayudas',
              'GET.administracion.tablas.ayudaCampos.modificar' => 'Modificar Ayudas',
              ), */


//        'RecaudosSolicitudController' => array(
//            'Descripcion' => 'Recaudos de Solicitud',
//            'POST.recaudossolicitud.modificar' => 'Guardar Recaudos',
//            'GET.recaudossolicitud.modificar' => 'Modificar Recaudos',
//            'GET.recaudossolicitud.descargar' => 'Descargar Recaudos',
//        ),
//        'FotosSolicitudController' => array(
//            'Descripcion' => 'Galeria de Fotos de Solicitud',
//            'DELETE.fotossolicitud.foto' => 'Borrar Foto',
//            'POST.fotossolicitud.modificar' => 'Guardar Foto',
//            'GET.fotossolicitud.modificar' => 'Modificar Foto',
//            'GET.fotossolicitud.descargar' => 'Descargar Foto',
//        ),
//        'BitacorasController' => array(
//            'Descripcion' => 'Bitacora',
//            'POST.bitacoras.modificar' => 'Guardar Bitacora',
//            'GET.bitacoras.bitacora' => 'Ver Bitacora',
//            'GET.bitacoras.atendida' => 'Ver Atendida',
//        ),        
    );

    /**
     * Array clave valor que le asocia a un atributo del modelo una oración o una frase que describe al atributo.
     * Se usa para construir los mensajes de error.
     * @return array
     */
    protected function getPrettyFields() {
        return array(
            'name' => 'Nombre del grupo'
        );
    }

    /**
     * Oración o palabra mas descriptiva del nombre de la tabla que maneja el modelo
     * 
     * @return string
     */
    public function getPrettyName() {
        return "Grupos de usuario.";
    }

    public function getTableFields() {
        return ['name'];
    }

    public static function getCampoCombo() {
        return "name";
    }

    public static function getPrimaryKey() {
        return "id";
    }

}
