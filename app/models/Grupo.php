<?php

class Grupo extends BaseModel implements SimpleTableInterface {

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
        'PrincipalController' => array(
            'Descripcion' => 'Pagina principal.',
            'GET.' => 'Página de inicio',
        ),
        'CandidatoController' => array(
            'Descripcion' => 'Candidatos.',
            'GET.candidato.nuevo' => 'Ver formulario de agregar nuevo',
            'GET.candidato.modificar' => 'Ver formulario de edicion de candidato',
            'GET.candidato.eliminar' => 'Eliminar candidato',
            'POST.candidato.nuevo' => 'Guardar candidato',
            'GET.candidato.vercurriculum' => 'Ver curriculum ',
            'GET.candidato.imprimircurriculum' => 'Ver curriculum imprimible',
            'GET.candidato.cursos' => 'Ver cursos ',
            'POST.candidato.cursos' => 'Guardar cursos',
            'DELETE.candidato.cursos' => 'Eliminar cursos',
            'GET.candidato.contactoadicional' => 'Ver contactos',
            'GET.candidato.estudiosformales' => 'Ver estudios formales',
            'GET.candidato.experiencialaboral' => 'Ver experiencia laboral',
            'POST.candidato.experiencialaboral' => 'Guardar experiencia laboral',
            'DELETE.candidato.experiencialaboral' => 'Eliminar experiencia laboral',
            'GET.candidato.idiomas' => 'Ver idiomas',
            'POST.candidato.idiomas' => 'Guardar idiomas',
            'DELETE.candidato.idiomas' => 'Eliminar idioma',
            'POST.candidato.datosbasicos' => 'Guardar datos básicos',
            'POST.candidato.datos' => 'Guardar datos básicos',
            'POST.candidato.informacionfamiliar' => 'Guardar información familiar',
            'POST.candidato.areasinteres' => 'Guardar áreas de interés',
            'POST.candidato.estudiosformales' => 'Guardar estudios formales',
            'DELETE.candidato.estudiosformales' => 'Eliminar estudios formales',
            'POST.candidato.fortalezas' => 'Guardar fortalezas',
            'POST.candidato.resumen' => 'Guardar resumen',
            'POST.candidato.contactoadicional' => 'Guardar contactos personales',
            'DELETE.candidato.contactoadicional' => 'Eliminar contactos personales',
            'POST.candidato.subircv' => 'Cargar documento CV',
            'POST.candidato.subirfoto' => 'Carga foto',
            'GET.candidato.invitar' => 'Ver ficha de invitación',
            'POST.candidato.invitar' => 'Enviar ficha de invitación',
            'POST.candidato.preguntasadicionales' => 'Guardar preguntas adicionales',
            'GET.candidato.barracarga' => 'Visualizar barra de carga',
            'GET.candidato.validaremail' => 'Mostrar formulario de validación de e-mail',
            'GET.candidato.enviarvalidacion' => 'Enviar formulario de validación de e-mail',
            'GET.candidato.actualizarcv' => 'Enviar invitación por correo',
            'GET.candidato.documentos' => 'Ver documentos externos',
            'POST.candidato.documentos' => 'Guardar documentos externos',
            'DELETE.candidato.documentos' => 'Elimnar documentos externos',
            'GET.candidato.descargardocumento' => 'Descargar documentos',
            'GET.candidato.busquedasrelacionadas' => 'Ver busquedas relacionadas',
            'GET.candidato.compartir' => 'Ver pantalla compartir',
            'POST.candidato.compartir' => 'Compartir',
        ),
        'BusquedaController' => array(
            'Descripcion' => 'Búsquedas.',
            'GET.busqueda' => 'Ver pantalla principal',
            'GET.busqueda.modificar' => 'Modificar',
            'POST.busqueda' => 'Guadar',
            'DELETE.busqueda' => 'Borrar',
            'GET.busqueda.criterios' => 'Ver criterios',
            'GET.busqueda.criteriosform' => 'Ver formulario de criterios',
            'POST.busqueda.criterios' => 'Guardar criterios',
            'DELETE.busqueda.criterios' => 'Borrar criterios',
            'GET.busqueda.procesarbusqueda' => 'Boton procesar la búsqueda',
            'GET.busqueda.marcarcandidato' => 'Marcar candidatos',
            'GET.busqueda.resultadosguardados' => 'Mostrar resultados guardados',
            'GET.busqueda.descartarcandidato' => 'Descartar candidato',
            'GET.busqueda.eliminarcandidato' => 'Eliminar candidato',
            'POST.busqueda.calificarcandidato' => 'Calificar',
            'GET.busqueda.multiple' => 'Ver pantalla selección mùltiple',
            'POST.busqueda.multiple' => 'Guardar selección multiple',
            'GET.busqueda.entrevista' => 'Ver entrevista',
            'POST.busqueda.entrevista' => 'Guardar entrevista',
            'GET.busqueda.fechaenviado' => 'Ver fecha enviado al cliente',
            'POST.busqueda.fechaenviado' => 'Guardar fecha enviado al cliente',
            'GET.busqueda.fechacolocado' => 'Ver fecha colocado',
            'POST.busqueda.fechacolocado' => 'Guardar fecha colocado',
            'POST.busqueda.cerrar' => 'Cerrar',
            'GET.busqueda.entrevistatimeline' => 'Ver línea del tiempo',
            'GET.busqueda.entrevistacliente' => 'Ver entrevistas en cliente',
            'POST.busqueda.entrevistacliente' => 'Guardar entrevistas en cliente',
            'DELETE.busqueda.entrevistacliente' => 'Eliminar entrevistas en cliente',
            'GET.busqueda.candidatomanual' => 'Ver formulario agregar candidato manual',
            'POST.busqueda.candidatomanual' => 'Guardar candidato manual',
            'GET.busqueda.candidatomanualbd' => 'Ver formulario agregar canddato existente',
            'POST.busqueda.candidatomanualbd' => 'Guardar formulario agregar canddato existente',
            'GET.busqueda.candidatomanualbdbuscar' => 'Buscador de candidatos para agregar manualmente',
            'POST.busqueda.guardarcriterios' => 'Guardar criterios',
            'GET.busqueda.versiones' => 'Ver versioness',
            'POST.busqueda.versiones' => 'Guardar versioness',
            'DELETE.busqueda.versiones' => 'Eliminar versiones',
            'POST.busqueda.informeremuneracion' => 'Guardar informe de remuneración',
        ),
        'ClientesController' => array(
            'Descripcion' => 'Clientes.',
            'GET.clientes' => 'Ver lista clientes',
            'GET.clientes.modificar' => 'Modificar',
            'POST.clientes' => 'Guardar',
            'DELETE.clientes' => 'Eliminar',
            'GET.clientes.contactos' => 'Ver contactos',
            'POST.clientes.contactos' => 'Guardar contactos',
            'DELETE.clientes.contactos' => 'Borrar contactos',
            'GET.clientes.ficha' => 'Ver ficha',
        ),
        'AdministracionController' => array(
            'Descripcion' => 'Administración.',
            'GET.administracion' => 'inicio',
        ),
        'ActualizacionesController' => array(
            'Descripcion' => 'Actualizaciones.',
            'GET.administracion.actualizaciones' => 'Principal',
            'GET.administracion.actualizaciones.instalar' => 'Instalar',
            'GET.administracion.actualizaciones.respaldar' => 'Respaldar',
        ),
        'AreaTrabajoController' => array(
            'Descripcion' => 'Areas de trabajo.',
            'GET.administracion.area-trabajo' => 'Ver',
            'POST.administracion.area-trabajo' => 'Guardar',
            'DELETE.administracion.area-trabajo' => 'Eliminar',
            'GET.administracion.area-trabajo.modificar' => 'Modificar',
        ),
        'AreaConocimientoController' => array(
            'Descripcion' => 'Areas de conocimiento.',
            'GET.administracion.area-conocimiento.areaestudios' => 'Ver Area de estudios',
            'GET.administracion.area-conocimiento' => 'Ver ares de conocimiento',
            'POST.administracion.area-conocimiento' => 'Guardar',
            'DELETE.administracion.area-conocimiento' => 'Eliminar',
            'GET.administracion.area-conocimiento.modificar' => 'Modificar',
        ),
        'IdiomaController' => array(
            'Descripcion' => 'Idiomas.',
            'GET.administracion.idioma' => 'Ver',
            'POST.administracion.idioma' => 'Guardar',
            'DELETE.administracion.idioma' => 'Eliminar',
            'GET.administracion.idioma.modificar' => 'Modificar',
        ),
        'PaisController' => array(
            'Descripcion' => 'Paises.',
            'GET.administracion.pais.instituciones' => 'Ver instituciones',
            'GET.administracion.pais.estados' => 'Ver estados',
            'GET.administracion.pais' => 'Ver paises',
            'POST.administracion.pais' => 'Guardar',
            'DELETE.administracion.pais' => 'Eliminar',
            'GET.administracion.pais.modificar' => 'Modificar',
        ),
        'NivelDominioController' => array(
            'Descripcion' => 'Niveles de dominio.',
            'GET.administracion.nivel-dominio' => 'Ver',
            'POST.administracion.nivel-dominio' => 'Guardar',
            'DELETE.administracion.nivel-dominio' => 'Eliminar',
            'GET.administracion.nivel-dominio.modificar' => 'Modificar',
        ),
        'EstadoCivilController' => array(
            'Descripcion' => 'Estados civiles.',
            'GET.administracion.estado-civil' => 'Ver',
            'POST.administracion.estado-civil' => 'Guardar',
            'DELETE.administracion.estado-civil' => 'Eliminar',
            'GET.administracion.estado-civil.modificar' => 'Modificar',
        ),
        'CantidadEmpleadosController' => array(
            'Descripcion' => 'Cantidad de empleados.',
            'GET.administracion.cantidad-empleados' => 'Ver',
            'POST.administracion.cantidad-empleados' => 'Guardar',
            'DELETE.administracion.cantidad-empleados' => 'Eliminar',
            'GET.administracion.cantidad-empleados.modificar' => 'Modificar',
        ),
        'CompAccionariaController' => array(
            'Descripcion' => 'Composicion accionaria.',
            'GET.administracion.comp-accionaria' => 'Ver',
            'POST.administracion.comp-accionaria' => 'Guardar',
            'DELETE.administracion.comp-accionaria' => 'Eliminar',
            'GET.administracion.comp-accionaria.modificar' => 'Modificar',
        ),
        'TipoDocumentoController' => array(
            'Descripcion' => 'Tipos de documento.',
            'GET.administracion.tipo-documento' => 'Ver',
            'POST.administracion.tipo-documento' => 'Guardar',
            'DELETE.administracion.tipo-documento' => 'Eliminar',
            'GET.administracion.tipo-documento.modificar' => 'Modificar',
        ),
        'SectorIndustriaController' => array(
            'Descripcion' => 'Sector de la industria.',
            'GET.administracion.sector-industria.actividadindustria' => 'Actividad industria',
            'GET.administracion.sector-industria' => 'Ver',
            'POST.administracion.sector-industria' => 'Guardar',
            'DELETE.administracion.sector-industria' => 'Eliminar',
            'GET.administracion.sector-industria.modificar' => 'Modificar',
        ),
        'ActividadIndustriaController' => array(
            'Descripcion' => 'Actividades de la industria.',
            'GET.administracion.actividad-industria' => 'Ver',
            'POST.administracion.actividad-industria' => 'Guardar',
            'DELETE.administracion.actividad-industria' => 'Eliminar',
            'GET.administracion.actividad-industria.modificar' => 'Modificar',
        ),
        'AreaEstudioController' => array(
            'Descripcion' => 'Areas de estudio.',
            'GET.administracion.area-estudio' => 'Ver',
            'POST.administracion.area-estudio' => 'Guardar',
            'DELETE.administracion.area-estudio' => 'Eliminar',
            'GET.administracion.area-estudio.modificar' => 'Modificar',
        ),
        'EstadoPaisController' => array(
            'Descripcion' => 'Estados de los paises.',
            'GET.administracion.estado-pais' => 'Ver',
            'POST.administracion.estado-pais' => 'Guardar',
            'DELETE.administracion.estado-pais' => 'Eliminar',
            'GET.administracion.estado-pais.modificar' => 'Modificar',
        ),
        'EmpresasController' => array(
            'Descripcion' => 'Empresas.',
            'GET.administracion.empresa.buscar' => 'getBuscar',
            'GET.administracion.empresa' => 'Ver',
            'POST.administracion.empresa' => 'Guardar',
            'DELETE.administracion.empresa' => 'Eliminar',
            'GET.administracion.empresa.modificar' => 'Modificar',
        ),
        'PreguntaController' => array(
            'Descripcion' => 'Preguntas.',
            'GET.administracion.pregunta' => 'Ver',
            'POST.administracion.pregunta' => 'Guardar',
            'DELETE.administracion.pregunta' => 'Eliminar',
            'GET.administracion.pregunta.modificar' => 'Modificar',
        ),
        'SubAreaTrabajoController' => array(
            'Descripcion' => 'Areas de exposición.',
            'GET.administracion.subarea-trabajo' => 'Ver',
            'POST.administracion.subarea-trabajo' => 'Guardar',
            'DELETE.administracion.subarea-trabajo' => 'Eliminar',
            'GET.administracion.subarea-trabajo.modificar' => 'Modificar',
        ),
        'ConfiguracionAvanzadaController' => array(
            'Descripcion' => 'Configuración avanzada.',
            'GET.administracion.configuracion-avanzada' => 'Ver',
            'POST.administracion.configuracion-avanzada' => 'Guardar',
            'DELETE.administracion.configuracion-avanzada' => 'Eliminar',
            'GET.administracion.configuracion-avanzada.modificar' => 'Modificar',
        ),
        'AyudaController' => array(
            'Descripcion' => 'Ayuda de los campos.',
            'GET.administracion.ayudas.buscar' => 'Buscar',
            'GET.administracion.ayudas.todas' => 'Ver todas',
            'POST.administracion.ayudas.guardar' => 'Guardar ayudas',
            'GET.administracion.ayudas' => 'Ver',
            'POST.administracion.ayudas' => 'Guardar',
            'DELETE.administracion.ayudas' => 'Eliminar',
            'GET.administracion.ayudas.modificar' => 'Modificar',
        ),
        'InstitucionController' => array(
            'Descripcion' => 'Instituciones.',
            'GET.administracion.institucion' => 'Ver',
            'POST.administracion.institucion' => 'Guardar',
            'DELETE.administracion.institucion' => 'Eliminar',
            'GET.administracion.institucion.modificar' => 'Modificar',
        ),
        'TablasController' => array(
            'Descripcion' => 'Tablas de búsqueda.',
            'GET.administracion.tablas.campos' => 'Campos',
            'GET.administracion.tablas' => 'Ver',
            'POST.administracion.tablas' => 'Guardar',
            'DELETE.administracion.tablas' => 'Eliminar',
            'GET.administracion.tablas.modificar' => 'Modificar',
        ),
        'CamposController' => array(
            'Descripcion' => 'Campos de búsqueda.',
            'GET.administracion.campos.operadores' => 'Operadores',
            'GET.administracion.campos.divbusqueda' => 'Búsqueda',
            'GET.administracion.campos' => 'Ver',
            'POST.administracion.campos' => 'Guardar',
            'DELETE.administracion.campos' => 'Eliminar',
            'GET.administracion.campos.modificar' => 'Modificar',
        ),
        'UsuarioController' => array(
            'Descripcion' => 'Usuarios.',
            'GET.administracion.usuario' => 'Ver',
            'POST.administracion.usuario' => 'Guardar',
            'DELETE.administracion.usuario' => 'Eliminar',
            'GET.administracion.usuario.modificar' => 'Modificar',
        ),
        'GrupoController' => array(
            'Descripcion' => 'Grupos.',
            'GET.administracion.grupo' => 'Ver',
            'POST.administracion.grupo' => 'Guardar',
            'DELETE.administracion.grupo' => 'Eliminar',
            'GET.administracion.grupo.modificar' => 'Modificar',
        ),
        'ReportesController' => array(
            'Descripcion' => 'Reportes.',
            'GET.reportes.controlreclutamiento' => 'Control Reclutamiento',
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

}
