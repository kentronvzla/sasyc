<?php namespace Administracion\Seguridad;

class GruposController extends \Administracion\TablasBaseController {
    protected static $nombreClase = "Grupo";
    protected static $nombreColeccion = "grupos";
    protected static $nombreVista = "grupo";
    protected static $nombreVariable = "grupo";
    protected static $nombreCarpeta = 'seguridad';

  

    public function __construct() {
        parent::__construct();
    }

    public function getModificar($idgrupo= null) {
        $data['grupo'] = \Grupo::findOrNew($idgrupo);
        $permisosGlobales = \Grupo::$permisos;
       
        try {
            
            $sentryGroups = \Sentry::findGroupById($idgrupo);
            
        } catch (Exception $ex) {
            $sentryGroups = null;
        }
        if (is_object($sentryGroups)) {
            $data['permisos'] = array();
            foreach ($permisosGlobales as $key => $permiso) {            
                $data['permisos'][$key] = array(
                    'Descripcion' => array_values($permiso)[0],
                );               
                $tiene = false;
                foreach ($permiso as $per => $descripcion) {                   
                    if ($sentryGroups->hasAccess($per)) {
                        $data['permisos'][$key][$per] = $descripcion;
                        $tiene = true;                     
                }
            }
                if (!$tiene) {
                    unset($data['permisos'][$key]);
                    
                }else{ 
                return \View::make('administracion.seguridad.gruposform', $data);
            }
            
                }
              
        } 
        return \View::make('administracion.seguridad.gruposform', $data);
    }

   
    
        public function postConcederpermiso($idgrupo, $permiso) {
        $sentryGroup = \Sentry::findGroupById($idgrupo);   
        $permisos = $sentryGroup->getPermissions();
        $permisos[$permiso] = 1;
        $sentryGroup->permissions = $permisos;
        $sentryGroup->save();
        return \Response::json(array('mensaje' => 'Se concedio el permiso correctamente.'));
    }

        public function postDenegarpermiso($idgrupo, $permiso) {
        $sentryGroup = \Sentry::findGroupById($idgrupo);
        $permisos = $sentryGroup->getPermissions();
        $permisos[$permiso] = 0;
        $sentryGroup->permissions = $permisos;
        $sentryGroup->save();
        return \Response::json(array('mensaje' => 'Se denego el permiso correctamente.'));
    }
    
}
    
    
    
    
    

