<?php namespace Administracion\Seguridad;

class GruposController extends \Administracion\TablasBaseController {

    public function __construct() {
        parent::__construct();
    }

    public function getModificar($id = null) {
        $data['grupo'] = \Grupo::findOrNew($id);
        $permisosGlobales = \Grupo::$permisos;
        try {
            $sentryGroup = \Sentry::findGroupById($id);
        } catch (\Exception $ex) {
            $sentryGroup = null;
        }
        if (is_object($sentryGroup)) {
            $data['permisos'] = array();
            foreach ($permisosGlobales as $key => $permiso) {
                $data['permisos'][$key] = array(
                    'Descripcion' => array_values($permiso)[0],
                );
                $tiene = false;
                foreach ($permiso as $per => $descripcion) {
                    if ($sentryGroup->hasAccess($per)) {
                        $data['permisos'][$key][$per] = $descripcion;
                        $tiene = true;
                    }
                }
                if (!$tiene) {
                    unset($data['permisos'][$key]);
                }
            }
        } else {
            $data['permisos'] = array(
                '' => array(),
            );
        }
        return \View::make('administracion.seguridad.gruposform', $data);
    }

    public function postConcederpermiso() {
        $sentryGroup = Sentry::findGroupById(Input::get('ID'));
        $permisos = $sentryGroup->getPermissions();
        $permisos[Input::get('PERMISO')] = 1;
        $sentryGroup->permissions = $permisos;
        $sentryGroup->save();
        return \Response::json(array('mensaje' => 'Se concedió el permiso correctamente.'));
    }

    public function postDenegarpermiso() {
        $sentryGroup = Sentry::findGroupById(Input::get('ID'));
        $permisos = $sentryGroup->getPermissions();
        $permisos[Input::get('PERMISO')] = 0;
        $sentryGroup->permissions = $permisos;
        $sentryGroup->save();
        return \Response::json(array('mensaje' => 'Se denegó el permiso correctamente.'));
    }

}
