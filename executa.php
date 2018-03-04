<?php

include 'constants.inc.php';
include 'sistema.inc.php';
include 'directoris.inc.php';
include  'arxius.inc.php';

session_start();

$command = "";
$actual_path = BASE;


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (!empty($_POST["command"]) | !isset($_POST["command"])){
        $command = $_POST["command"];


        $comando = explode(' ',$command);
        $nameCommand = strtolower($comando[0]);

        switch ($nameCommand){
            case 'ls':
                $dir = $comando[1];
                $list = llistar($dir);
                $_SESSION['answer'] = $list;
                break;
            case 'pwd':
                $path = ruta();
                $_SESSION['answer'] = $path;
                break;
            case 'stats':
                $fdisk = stats_sistema();
                $_SESSION['answer'] = $fdisk;
                break;
            case 'mkdir':
                $mkdir = crea_directori($command);
                $_SESSION['answer'] = $mkdir;
                break;
            case 'rm':
                $flag = $comando[1];
                $nombreCosa = $comando[2];
                if ($flag == '-f'){
                    $rm = esborra_fitxer($nombreCosa);
                }else if( $flag == '-d'){
                    $rm = esborra_directori($nombreCosa);
                }else{
                    $rm = 'Este flag no existe';
                }
                $_SESSION['answer'] = $rm;
                break;
            case 'mvdir':
                $dir=$comando[1];
                $rutadesti = $comando[2];
                $mv = mou_directori($dir,$rutadesti);
                $_SESSION['answer']=$mv;
                break;
            case 'cpdir':
                $dir=$comando[1];
                $rutadesti = $comando[2];
                $cp = cp_dir($dir,$rutadesti);
                $_SESSION['answer']=$cp;
                break;
            case 'cp':
                $fitxer = $comando[1];
                $rutadesti = $comando[2];
                $rm = copia_fitxer($fitxer,$rutadesti);
                $_SESSION['answer']=$rm;

                break;
            case 'find':
                $fixer = $comando[1];
                $dir = $comando[2];
                $find = find_fixer($fixer,$dir);
                $_SESSION['answer']= $find;
                break;
            default:
                $list = ['Command not found'];
                $_SESSION['answer'] = $list;


        }
    }
    header('Location: consola.php');

}

?>
