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

?>
