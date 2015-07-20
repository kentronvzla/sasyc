<?php

/**
 * Carga la configuración de la base de datos para el webservice 
 *
 * @author Reysmer Valle
 * @fecha 2015-07-16 
 */
class ConfiguracionController extends BaseController{
    
    public function __construct() {
        parent::__construct();
        $this->forgetBeforeFilter('auth');
        $this->forgetBeforeFilter('verificarPermiso');
    }
    
    public function getParametros() {
        $parametros = array(
            'driver_pgsql' => Config::get('database.connections.pgsql.driver'),
            'host_pgsql' => Config::get('database.connections.pgsql.host'),
            'db_pgsql' => Config::get('database.connections.pgsql.database'),
            'username_pgsql' => Config::get('database.connections.pgsql.username'),
            'password_pgsql' => Config::get('database.connections.pgsql.password'),
        );
        return Response::json($parametros);
    }
}
