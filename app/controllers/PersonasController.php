<?php

class PersonasController extends BaseController {

    public function __construct() {
        parent::__construct();
    }
    
    public function getBuscar(){
        $persona = Persona::findOrNewByCedula(Input::get('tipo_nacionalidad_id'), Input::get('ci'));
        return Response::json(['persona'=>$persona]);
    }

    public function postCrear(){
        $persona = Persona::findOrNewByCedula(Input::get('tipo_nacionalidad_id'), Input::get('ci'));
        $persona->fill(Input::all());
        if($persona->save()){
            return Response::json(['persona'=>$persona, 'mensaje'=>'Datos guardados correctamente']);
        }
        return Response::json(['errores'=>$persona->getErrors()],400);
    }
    
    public function postModificar() {
        $persona = Persona::findOrNew(Input::get('id'));
        $persona->fill(Input::all());
        if ($persona->save()) {
            return Response::json(['persona'=>$persona, 'mensaje'=>'Datos guardados correctamente']);
        }
        return Response::json(['errores'=>$persona->getErrors()],400);
    }
}
