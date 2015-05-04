<?php namespace Administracion\Seguridad;

class GruposController extends \Administracion\TablasBaseController {

   
    public function __construct() {
        parent::__construct();
    }

    public function getModificar($id= null) {
        $data['grupo'] = \Grupo::findOrNew($id);
 
        $permisosGlobales = \Grupo::$permisos;
       
        try {
            
            $sentryGroups = \Grupo::findGroupById($id);
        } catch (\Exception $ex) {
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
     $grupo= \Grupo::findOrNew($idgrupo);
      $permisosGlobales = \Grupo::$permisos;
      $rol= $permisos[$permiso] = 1;
      $roles=array($permiso=>$rol);
      $json_string = json_encode($roles);
      $grupo->permissions=$json_string;
      $grupo->save();
     
      return \Response::json(array('mensaje' => 'Se concedió el permiso correctamente.'));
    }

    
//        public function postConcederpermiso() {
//       $sentryGroup =\Sentry::findGroupById('id');
//        $permisos = $sentryGroup->getPermissions();
//        $permisos[Input::get('permiso')] = 1;
//        $sentryGroup->permissions = $permisos;
//        $sentryGroup->save();
//        return \Response::json(array('mensaje' => 'Se denegó el permiso correctamente.'));
//    }

   
    
     public function postDenegarpermiso($idgrupo, $permiso) {
      $grupo= \Grupo::findOrNew($idgrupo);
      $permisosGlobales = \Grupo::$permisos;
      $rol= $permisos[$permiso] = 0;
      $roles=array($permiso=>$rol);
      $json_string = json_encode($roles);
      $grupo->permissions=$json_string;
      $grupo->save();
        return \Response::json(array('mensaje' => 'Se denego el permiso correctamente.'));
    }
    
}
    
    
    
    
    

