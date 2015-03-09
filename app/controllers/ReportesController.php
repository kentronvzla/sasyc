<?php

class ReportesController extends BaseController {

    public function __construct() {
        parent::__construct();
    }
    
    public function getNueva() {
        return View::make("reportes.generar");
    }
}
