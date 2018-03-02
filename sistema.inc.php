<?php

function llistar($dir){
    if (empty($dir)){
        return scandir(BASE);

    }else{
        return scandir(BASE.DIRECTORY_SEPARATOR.$dir);

    }
}

function ruta(){
    $actual_path = getcwd();
    return $actual_path;
}

function stats_sistema(){
    $espacio = Array();
    $total = disk_total_space("/");
    $free = disk_free_space("/");

    $libreGB = number_format($free / pow(10,9),2);

    $librePorsentaje = number_format($free/$total*100,2);
    $espacio_libre =  $libreGB."GB libre, ".$librePorsentaje."%";

    $ocupadoGB = number_format(($total-$free)/pow(10,9),2);
    $ocupadoPorsentaje = number_format(($total-$free)/$total*100,2);
    $espacio_ocupado = $ocupadoGB."GB utilizado, ".$ocupadoPorsentaje."%";

    array_push($espacio, $espacio_libre, $espacio_ocupado);
    return $espacio;
}
?>
