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
