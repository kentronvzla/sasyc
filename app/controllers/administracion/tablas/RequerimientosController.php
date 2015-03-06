<?php

namespace Administracion\Tablas;

/**
 * Description of RequerimientosController
 *
 * @author Nadin Yamani
 */
class RequerimientosController extends \Administracion\TablasBaseController {

    protected static $eagerLoading = ['tipoAyuda', 'tipoRequerimiento'];
}
