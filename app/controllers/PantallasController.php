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
        return View::make('manejosolicitudes.solicitudesanteriores');
    }
    public function getSolicitud(){
        return View::make('manejosolicitudes.solicitud');
    }
    
    public function getPlantilla(){
        return View::make('manejosolicitudes.plantilla');
    }

    public function getInforme(){
        return View::make('manejosolicitudes.informesocioeconomico');
    }
    
    public function getGrupofamiliar(){
        return View::make('manejosolicitudes.grupofamiliar');
    }    

    public function getBitacora(){
        return View::make('manejosolicitudes.bitacora');
    } 

    public function getRecaudos(){
        return View::make('manejosolicitudes.recaudos');
    } 

    public function getPresupuesto(){
        return View::make('manejosolicitudes.presupuesto');
    }     
    
    public function getSubirdoc(){
        return View::make('manejosolicitudes.subirdoc');
    }     
    
    public function getSubirfotos(){
        return View::make('manejosolicitudes.subirfotos');
    } 
    
}
