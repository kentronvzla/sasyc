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
class MunicipiosController extends \Administracion\TablasBaseController {

    protected static $eagerLoading = ['estado'];

    public function getParroquias($id) {
        $parroquias = \Parroquia::getCombo($id);
        return \Response::json($parroquias);
    }

}
