<?php
function find_fixer($fixer, $dir){
    $path = BASE.DIRECTORY_SEPARATOR.$dir;
    $content = scandir($path);

    foreach ($content as $item) {
        if (is_file($path.DIRECTORY_SEPARATOR.$item)){
            if ($fixer == $item){
                return 'Fichero encontrado: '.$item;
            }
        }
    }
    return 'Fichero no existe';
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
        return 'Archivo no existe';
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
    $carpeta_desti = BASE.DIRECTORY_SEPARATOR.$rutadesti;
    if (file_exists(BASE.DIRECTORY_SEPARATOR.$fitxer)){
        if (is_dir($carpeta_desti)){
            if (copy(BASE.DIRECTORY_SEPARATOR.$fitxer,$carpeta_desti.DIRECTORY_SEPARATOR.$fitxer)){
                return 'Archivo '.$fitxer.' copiado a '.$rutadesti;
            }else{
                return 'Error de copiar archivo';
            }
        }else{
            if (mkdir($carpeta_desti)){
                copia_fitxer($fitxer,$rutadesti);
            }
        }
    }else{
        return 'Archivo no existe';
    }


}

function sha1_fitxer($fitxer){
    $fileName = BASE.DIRECTORY_SEPARATOR.$fitxer;

    if (is_file($fileName)){
        $sha1File = sha1($fileName);

        return 'sha1 de archivo '.$fitxer.' es '.$sha1File;
    }else{
        return 'Archivo no existe';
    }

}

function md5_fitxer($fitxer){
    $fileName = BASE.DIRECTORY_SEPARATOR.$fitxer;

    if (is_file($fileName)){
        $md5File = md5_file($fileName);

        return 'sha1 de archivo '.$fitxer.' es '.$md5File;
    }else{
        return 'Archivo no existe';
    }

}

function crea_modifica_fixer($fixer,$contigut){
    $fixer_path = BASE.DIRECTORY_SEPARATOR.$fixer;
    if (empty($contigut)){
        //return 'llega aqui=?';
        //return BASE.DIRECTORY_SEPARATOR.$fixer;
        fopen($fixer_path,"w");
        return "Se ha creado el archivo ".$fixer;
    }else{
        if (file_exists($fixer_path)){
            $file_stream = fopen($fixer_path,"w");
            fwrite($file_stream,$contigut);
            fclose($file_stream);
            return "Se ha modificado el archivo";
        }else{
            return "El archivo '".$fixer."' no existe";
        }
    }
}




?>
