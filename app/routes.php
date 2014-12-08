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
        
    });
    Route::group(array('prefix' => 'tablas', 'namespace' => 'Tablas'), function() {
        
    });
});

Route::controller('pantallas','PantallasController');
