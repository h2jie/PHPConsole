<?php
include_once 'sistema.inc.php';


function crea_directori($dir)
{

    $carpeta = explode(' ', $dir);
    $nombreCarpeta = $carpeta[1];

    var_dump($nombreCarpeta);

    if (mkdir(BASE . "//" . $nombreCarpeta)) {
        return 'Carpeta creado';
    }

    if (file_exists(BASE . "//" . $nombreCarpeta)) {
        return 'Carpeta ya existe';
    }

}

function esborra_directori($dir){
    $carpeta = explode(' ', $dir);
    $nombreCarpeta = $carpeta[1];

    if (file_exists(BASE . "//" . $nombreCarpeta)){
        $content = scandir($nombreCarpeta);
        if (empty($content)){
            rmdir(BASE . "//" . $nombreCarpeta);
            return 'Carpeta borrado';
        }else{
            foreach ($content as $item){
                $current_file = $nombreCarpeta.'/'.$item;
                unlink($current_file);
            }
            rmdir($nombreCarpeta);
        }
    }else{
        return 'La carpeta no existe';
    }
}

?>
