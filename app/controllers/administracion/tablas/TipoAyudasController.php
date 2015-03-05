<?php

namespace Administracion\Tablas;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PantallasController
 *
 * @author Daigle Pinto
 */
class TipoAyudasController extends \Administracion\TablasBaseController {

    public function getAreas($id) {
        $areas = \Area::getCombo($id);
        return \Response::json($areas);
    }

}
