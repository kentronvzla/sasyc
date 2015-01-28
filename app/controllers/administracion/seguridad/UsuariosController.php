<?php namespace Administracion\Seguridad;

class UsuariosController extends \Administracion\TablasBaseController {

    protected static $nombreClase = "Usuario";
    protected static $nombreColeccion = "usuarios";
    protected static $nombreVista = "usuario";
    protected static $nombreVariable = "usuario";
    protected static $nombreCarpeta = 'seguridad';

    public function __construct() {
        parent::__construct();
    }
    
    public function postIndex() {
        $variable = call_user_func(array(static::$nombreClase, 'findOrNew'), Input::get('ID'));
        $variable->fill(Input::all());
        if ($variable->save()) {
            $variable->grupos()->sync(array(Input::get('idgrupo')));
            return Response::json(array('mensaje' => 'Se guardo el ' . call_user_func(array(static::$nombreClase, 'getPrettyName')) . ' correctamente.'));
        } else {
            return Response::json(array('errores' => $variable->getErrors()), 400);
        }
    }


}
