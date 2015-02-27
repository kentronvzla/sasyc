<?php namespace Administracion\Seguridad;

use Illuminate\Support\Facades\Input;

class UsuariosController extends \Administracion\TablasBaseController {

    public function __construct() {
        parent::__construct();
    }

    public function postIndex() {
        $usuario = \Usuario::findOrNew(Input::get('id'));
        $usuario->fill(\Input::all());
        if(\Input::get('password')!=""){
            $usuario->password = \Input::get('password');
        }
        if ($usuario->save()) {
            $usuario->grupos()->sync(\Input::get('grupos', []));
            return \Redirect::to('administracion/seguridad/usuarios')
                ->with('mensaje', 'Se guardo el usuario correctamente.');
        } else {
            return \Redirect::back()->withInput()
                ->withErrors($usuario->getErrors());
        }
    }
}
