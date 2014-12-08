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
    
    public function getConsultasolicitudes(){
        return View::make('manejosolicitudes.consultasolicanteriores');
    }
    
    public function getBeneficiario(){
        return View::make('manejosolicitudes.datosbeneficiario');
    }
    
    public function getTabla(){
        return View::make('manejosolicitudes.tabsolcitudesant');
    }
    public function getGestionarsolicitud(){
        return View::make('manejosolicitudes.datosbeneficiario');
    }
}
