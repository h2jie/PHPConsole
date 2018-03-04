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
    $dir_path = BASE.DIRECTORY_SEPARATOR.$dir;

    if (file_exists($dir_path)) {
        $content = scandir($dir_path);
        if (empty($content)) {
            if (is_dir($dir_path)){
                rmdir($dir_path);
            }else{
                unlink($dir_path);
            }
        } else {
            foreach ($content as $item) {
                $current_file = $dir_path . DIRECTORY_SEPARATOR . $item;
                if ($item!= "." && $item!= ".."){
                    if(is_dir($current_file)){
                        esborra_directori($dir.DIRECTORY_SEPARATOR.$item);
                    }else{
                        unlink($current_file);
                    }
                }
            }
            if (rmdir($dir_path)){
                return 'Carpeta borrado';
            }
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

function cp_dir($dir, $rutdesti){
    $origin = BASE.DIRECTORY_SEPARATOR.$dir;
    $destiny = BASE.DIRECTORY_SEPARATOR.$rutdesti;
    if (is_dir($origin)){
        $content = scandir($origin);
        $response = Array();
        foreach ($content as $item) {
            if ($item!= "." && $item!= ".."){
                array_push($response,copia_fitxer($origin.DIRECTORY_SEPARATOR.$item,$destiny.DIRECTORY_SEPARATOR.$item));
            }
        }
        return $response;
    }else{
        return 'No se ha podido copiar correctamente';
    }
}

?>
