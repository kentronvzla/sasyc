<?php namespace Administracion\Seguridad;
class GruposController extends \Administracion\TablasBaseController {

    public function __construct() {
        parent::__construct();
    }
    public function getModificar($id = null) {
        if ($id==null) {
            $data['grupo'] =  new \Grupo();
              $permisosGlobales = \Grupo::$permisos;

        try {
            $sentryGroup = \Sentry::findAllGroups();
        } catch (Exception $ex) {
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
       
           return \View::make('administracion.seguridad.creargrupos', $data);
            
        }
        $data['grupo'] = \Grupo::find($id);

        $permisosGlobales = \Grupo::$permisos;

        try {
            $sentryGroup = \Sentry::findGroupById($id);
        } catch (Exception $ex) {
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

    public function postConcederpermiso($idgrupo, $permiso) {
        $sentryGroups = \Sentry::findGroupById($idgrupo);
        $permisos = $sentryGroups->getPermissions();
        $permisos[$permiso] = 1;
        $sentryGroups->permissions = $permisos;
        $sentryGroups->save();
        return \Response::json(array('mensaje' => 'Se concedio el permiso correctamente.'));
    }

    public function postDenegarpermiso($idgrupo, $permiso) {
        $sentryGroups = \Sentry::findGroupById($idgrupo);
        $permisos = $sentryGroups->getPermissions();
        $permisos[$permiso] = 0;
        $sentryGroups->permissions = $permisos;
        $sentryGroups->save();
        return \Response::json(array('mensaje' => 'Se denego el permiso correctamente.'));
    }

    public function crear(){
        
        echo 'paso';
        
        
    }
    
    
    
}
