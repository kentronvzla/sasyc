<?php namespace Administracion\Tablas;

/**
 * Description of ClaseRequerimientoRequerimientosController
 *
 * @author Nadin Yamani
 */
class ClaseRequerimientoRequerimientosController extends \Administracion\TablasBaseController {

    protected static $eagerLoading = ['claseRequerimiento','requerimiento'];
}