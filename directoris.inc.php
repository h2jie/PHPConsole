<?php
include_once 'sistema.inc.php';


function crea_directori($dir)
{

    $carpeta = explode(' ', $dir);
    $nombreCarpeta = $carpeta[1];

    var_dump($nombreCarpeta);

    if (mkdir(BASE . DIRECTORY_SEPARATOR . $nombreCarpeta)) {
        return 'Carpeta creado';
    }

    if (file_exists(BASE . DIRECTORY_SEPARATOR . $nombreCarpeta)) {
        return 'Carpeta ya existe';
    }

}

function esborra_directori($dir)
{
    $carpeta = explode(' ', $dir);
    $nombreCarpeta = $carpeta[1];

    if (file_exists(BASE . DIRECTORY_SEPARATOR . $nombreCarpeta)) {
        $content = scandir($nombreCarpeta);
        if (empty($content)) {
            rmdir(BASE . DIRECTORY_SEPARATOR . $nombreCarpeta);
            return 'Carpeta borrado';
        } else {
            foreach ($content as $item) {
                $current_file = $nombreCarpeta . DIRECTORY_SEPARATOR . $item;
                unlink($current_file);
            }
            rmdir($nombreCarpeta);
        }
    } else {
        return 'La carpeta no existe';
    }
}

function mou_directori($dir, $rutadesti)
{
    if (file_exists(BASE . "//" . $dir)) {
        rename(BASE . "//" . $dir, BASE . DIRECTORY_SEPARATOR . $rutadesti);
        return 'Carpeta ya está movido';
    } else {
        return 'La carpeta no existe';
    }
}

function copia_directori($dir, $rutadesti)
{
    /*if (file_exists(BASE.DIRECTORY_SEPARATOR.$dir)){
        copy(BASE.DIRECTORY_SEPARATOR.$dir, BASE.DIRECTORY_SEPARATOR.$rutadesti);
        return 'Carpeta copiado';
    }else{
        return 'La carpeta no existe';
    }*/

    $src = opendir($dir);
    if (mkdir(BASE.DIRECTORY_SEPARATOR.$rutadesti)) {
        while (false !== ($file = readdir($src))) {
            if (($file != '.') && ($file != '..')) {
                copy(BASE . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $file, BASE . DIRECTORY_SEPARATOR . $rutadesti . DIRECTORY_SEPARATOR . $file);
                return 'copiado';
            }
        }
        closedir($src);
    }


}

?>
