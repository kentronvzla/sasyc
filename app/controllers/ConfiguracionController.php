<?php

/**
 * Carga la configuración de la base de datos para el webservice 
 *
 * @author Reysmer Valle
 * @fecha 2015-07-16 
 */
class ConfiguracionController extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->forgetBeforeFilter('auth');
        $this->forgetBeforeFilter('verificarPermiso');
    }

    public function getParametros() {
        if ((!isset($_SERVER['PHP_AUTH_USER'])) || (!isset($_SERVER['PHP_AUTH_PW']))) {
            header('WWW-Authenticate: Basic realm="Secured Area"');
            header('HTTP/1.0 401 Unauthorized');
            $response = ['error' => 'Authorization Required'];
        } else if ((isset($_SERVER['PHP_AUTH_USER'])) && (isset($_SERVER['PHP_AUTH_PW']))) {
            if (($_SERVER['PHP_AUTH_USER'] != "5@5yc") || ($_SERVER['PHP_AUTH_PW'] != "5@5yc")) {
                header('WWW-Authenticate: Basic realm="Secured Area"');
                header('HTTP/1.0 401 Unauthorized');
                $response = ['error' => 'Authorization Required'];
            } else if (($_SERVER['PHP_AUTH_USER'] == "5@5yc") || ($_SERVER['PHP_AUTH_PW'] == "5@5yc")) {
                $response = array(
                    'driver_pgsql' => Config::get('database.connections.pgsql.driver'),
                    'host_pgsql' => Config::get('database.connections.pgsql.host'),
                    'db_pgsql' => Config::get('database.connections.pgsql.database'),
                    'username_pgsql' => Config::get('database.connections.pgsql.username'),
                    'password_pgsql' => Config::get('database.connections.pgsql.password'),
                );
            }
        }
        return Response::json($response);
    }

}
