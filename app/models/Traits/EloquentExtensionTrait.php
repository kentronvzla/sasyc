<?php
/**
 * Created by PhpStorm.
 * User: Nadin Yamani
 * Date: 09/03/2015
 * Time: 02:28 PM
 */

namespace Traits;


trait EloquentExtensionTrait {

    public function parseFilter($campo, $valor, $query){
        //se verifica si hay que buscar en otras tablas
        if(str_contains($campo, '->')){
            $arrayOps = explode('->', $campo);
            //relacion sencilla
            if(count($arrayOps)==2){
                $tabla = str_plural_spanish(explode('.',$arrayOps[0])[1]);
                $campo = $tabla.'.'.$arrayOps[1];
            }
            //relacion de dos niveles
            else if(count($arrayOps)==3){
                $tabla = str_plural_spanish($arrayOps[1]);
                $campo = $tabla.'.'.$arrayOps[2];
            }
        }
        //arrays aplica whereIn, integer aplica =, strings aplica like %..%, fechas aplica >= o <= y se convierten en carbon
        try{
            $fecha = \Carbon::createFromFormat('d/m/Y', $valor);
            $esfecha = true;
        }catch (\Exception $e){
            $esfecha = false;
        }
        if($esfecha){
            $operador = str_contains($campo,'_desde') ? '>=':'<=';
            $campo = str_replace('_desde','',$campo);
            $campo = str_replace('_hasta','',$campo);
            $query->where($campo,$operador,$fecha);
        }
        else if(is_array($valor)){
            $query->whereIn($campo, $valor);
        }else if(is_numeric($valor)){
            $query->where($campo, $valor);
        }else if(is_string($valor)){
            //Se usa i like para que sea insensible a mayusculas
            $query->where($campo, 'ILIKE', '%'.$valor.'%');
        }
        return $query;
    }
}