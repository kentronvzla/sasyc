<?php namespace Administracion\Seguridad;

class UsuariosController extends \Administracion\TablasBaseController {

    public function __construct() {
        parent::__construct();
    }

    public function afterPostIndex($usuario){
        $usuario->grupos()->sync(\Input::get('grupos', []));
        if(\Input::get('password')!=""){
            $usuario->password = \Input::get('password');
        }
        $usuario->save();
    }
}
