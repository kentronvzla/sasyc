<?php

Route::group(['before'=>'auth'], function(){
    Route::get('','IndexController@inicio');
    Route::group(array('prefix' => 'administracion', 'namespace' => 'Administracion','before'=>'auth'), function() {
        Route::group(array('prefix' => 'seguridad', 'namespace' => 'Seguridad'), function() {
            Route::controller('usuarios', 'UsuariosController');
            Route::controller('grupos', 'GruposController');
             
        });
        Route::group(array('prefix' => 'tablas', 'namespace' => 'Tablas'), function() {
            Route::controller('tipoAyudas', 'TipoAyudasController');
            Route::controller('estados', 'EstadosController');
            Route::controller('municipios', 'MunicipiosController');
            Route::controller('areas', 'AreasController');
            Route::controller('configuraciones', 'ConfiguracionesController');
            Route::controller('estadoCiviles', 'EstadoCivilesController');
            Route::controller('nivelAcademicos', 'NivelAcademicosController');
            Route::controller('organismos', 'OrganismosController');
            Route::controller('parentescos', 'ParentescosController');
            Route::controller('parroquias', 'ParroquiasController');
            Route::controller('recaudos', 'RecaudosController');
            Route::controller('referentes', 'ReferentesController');
            Route::controller('requerimientos', 'RequerimientosController');
            Route::controller('tenencias', 'TenenciasController');
            Route::controller('tipoEventos', 'TipoEventosController');
            Route::controller('tipoNacionalidades', 'TipoNacionalidadesController');
            Route::controller('tipoRequerimientos', 'TipoRequerimientosController');
            Route::controller('tipoViviendas', 'TipoViviendasController');
            Route::controller('departamentos', 'DepartamentosController');
            Route::controller('recepciones', 'RecepcionesController');
            Route::controller('personas', 'PersonasController');
            Route::controller('procesos', 'ProcesosController');
            Route::controller('ayudaCampos', 'AyudaCamposController');
          
            
        });
        Route::get('', function(){
            return View::make('administracion.principal');
        });
    });
    Route::controller('solicitudes', 'SolicitudesController');
    Route::controller('personas', 'PersonasController');
    Route::controller('presupuestos', 'PresupuestosController');
    Route::controller('recaudossolicitud', 'RecaudosSolicitudController');
    Route::controller('bitacoras', 'BitacorasController');
    Route::controller('helpers', 'HelpersController');
    Route::controller('fotossolicitud', 'FotosSolicitudController');
    Route::controller('memorandum', 'MemosController');
    Route::controller('reportes', 'ReportesController');
    Route::controller('documentos', 'DocumentossasycesController');
    Route::controller('autocompletar', 'AutocompletarController');
   
    
});

Route::controller('login','LoginController');

   