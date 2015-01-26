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
class EstadosController extends \Administracion\TablasBaseController {

    public function getMunicipios($id) {
        $municipios = \Municipio::getCombo($id);
        return \Response::json($municipios);
    }

}
