<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', 'IndexController@inicio');

Route::group(array('prefix' => 'administracion', 'namespace' => 'Administracion'), function() {
    Route::group(array('prefix' => 'seguridad', 'namespace' => 'Seguridad'), function() {
        Route::controller('usuarios', 'UsuariosController');
        Route::controller('grupos', 'GruposController');
    });
    Route::group(array('prefix' => 'tablas', 'namespace' => 'Tablas'), function() {
        Route::controller('tipo-ayudas', 'TipoAyudasController');
        Route::controller('estados', 'EstadosController');
        Route::controller('municipios', 'MunicipiosController');
    });
});
Route::controller('login','LoginController');
//se coloca afuera porque no se maneja por namespace
Route::controller('administracion/actualizaciones', 'ActualizacionesController');

Route::controller('pantallas', 'PantallasController');
Route::controller('solicitudes', 'SolicitudesController');
Route::controller('personas', 'PersonasController');
Route::controller('presupuestos', 'PresupuestosController');
Route::controller('recaudossolicitud', 'RecaudosSolicitudController');
Route::controller('bitacoras', 'BitacorasController');
Route::controller('helpers', 'HelpersController');
Route::controller('fotossolicitud', 'FotosSolicitudController');
