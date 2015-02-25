<?php namespace Administracion\Tablas;

/**
 * Description of AreasController
 *
 * @author Nadin Yamani
 */
class AyudaCamposController extends \Administracion\TablasBaseController {

    public function getTodas(){
        return \Response::json(\AyudaCampo::all());
    }

    public function postCrear(){
        $ayuda = \AyudaCampo::crear(\Input::get('formulario'), \Input::get('campo'));
        return \Response::json([]);
    }
}