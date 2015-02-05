<?php

namespace Administracion\Tablas;

/**
 * Description of ParroquiasController
 *
 * @author Nadin Yamani
 */
class ParroquiasController extends \Administracion\TablasBaseController {

    protected static $eagerLoading = ['municipio.estado'];

}
