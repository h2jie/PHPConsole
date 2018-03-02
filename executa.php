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
            case 'fdisk':
                $fdisk = stats_sistema();
                $_SESSION['answer'] = $fdisk;
                break;
            case 'mkdir':
                $mkdir = crea_directori($command);
                $_SESSION['answer'] = $mkdir;
                break;
            case 'rm':
                $rm = esborra_directori($command);
                $_SESSION['answer'] = $rm;
                break;
            case 'mv':
                $dir=$comando[1];
                $rutadesti = $comando[2];
                $mv = mou_directori($dir,$rutadesti);
                $_SESSION['answer']=$mv;
                break;
            case 'cp':
                $dir=$comando[1];
                $rutadesti = $comando[2];
                $cp = copia_directori($dir,$rutadesti);
                $_SESSION['answer']=$cp;
                break;
            case 'find':
                $fixer = $comando[1];
                $dir = $comando[2];


            default:
                $list = ['Command not found'];
                $_SESSION['answer'] = $list;


        }
    }
    header('Location: consola.php');

}

?>
