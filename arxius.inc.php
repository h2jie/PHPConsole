<?php

function find_fixer($fixer, $dir){
    $content = scandir($dir);

    foreach ($content as $item) {
        if (is_file($content)){
            if ($fixer == $item){
                return $item;
            }
        }else{
            return null;
        }
    }
}


function stats_fitxer($fitxer){

    if(file_exists(BASE.DIRECTORY_SEPARATOR.$fitxer)){
        $stats = Array();
        $stat = stat(BASE.DIRECTORY_SEPARATOR.$fitxer);
        $uid = 'id usuario: '.$stat['uid'];
        $gid = 'id grupo: '.$stat['gid'];
        $accessTime = 'Tiempo de acceso: '.gmdate("Y-m-d H:i:s",$stat['atime']);
        $modifiTime = 'Tiempo de modificación: '.gmdate("Y-m-d H:i:s",$stat['mtime']);
        $sizeInByte = 'Tamaño en bytes: '.$stat['size'];

        array_push($stats,$uid,$gid,$accessTime,$modifiTime,$sizeInByte);

        return $stats;
    }else{
        return 'Archivo no existe';
    }

}

function esborra_fitxer($fitxer){
    $archivo = BASE.DIRECTORY_SEPARATOR.$fitxer;
    if (file_exists($archivo)){
        unlink($archivo);
        return 'Archivo '.$fitxer.' borrado';
    }else{
        return 'Archovo no existe';
    }
}


function mou_fitxer($fitxer,$rutadesti){
    $archivo = BASE.DIRECTORY_SEPARATOR.$fitxer;

    if (file_exists($archivo)){
        if (rename($archivo,BASE.DIRECTORY_SEPARATOR.$rutadesti)){
            return 'Archivo movido';
        }
    }else{
        return 'Archivo no existe';
    }
}

function copia_fitxer($fitxer, $rutadesti){
    $archivoOriginal = BASE.DIRECTORY_SEPARATOR.$fitxer;
    $archivoDesti = BASE.DIRECTORY_SEPARATOR.$rutadesti;

    if (file_exists($archivoOriginal)){
        if (copy($archivoOriginal,$archivoDesti)){
            return 'Archivo '.$fitxer.' copiado como '.$rutadesti;
        }else{
            return 'Error de copiar archivo';
        }
    }else{
        return 'Archivo no existe';
    }


}



?>
