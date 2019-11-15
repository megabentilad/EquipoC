<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function comprobarFichero($fichero,$ext){
    $mensajeError=null;
    if(empty($fichero)){
        $mensajeError="No es un fichero";
    }else{
    $fichero=htmlspecialchars(strip_tags(trim($fichero)));
    $Aarray= explode(".", $fichero);
    if($Aarray[1]!==$ext){
        $mensajeError="No tiene la misma extension";
    }
    }
    return  $mensajeError;
}


