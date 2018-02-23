<?php

function llistar($path){
    return scandir($path);
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
    $espacio_GB = $libreGB."GB en libre<br>";


    $libreProsentaje = number_format($free/$total*100,2);



    $espacio_por =  $libreProsentaje."% en libre";
    array_push($espacio,$espacio_GB);
    array_push($espacio,$espacio_por);
}
?>
