<?php

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
class PantallasController extends BaseController{
    
    public function getNuevasolicitud(){
        return View::make('manejosolicitudes.nuevasolicitud');
    }
    
    public function getBeneficiario(){
        return View::make('manejosolicitudes.beneficiario');
    }
    
    public function getSolicitudesanteriores(){
        return View::make('manejosolicitudes.solcitudesanteriores');
    }
    public function getSolicitud(){
        return View::make('manejosolicitudes.solicitud');
    }
    
    public function getPlantilla(){
        return View::make('manejosolicitudes.plantilla');
    }
}
