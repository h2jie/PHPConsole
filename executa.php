<?php

include 'constants.inc.php';
include 'sistema.inc.php';

session_start();

$command = "";
$actual_path = BASE;


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (!empty($_POST["command"]) | !isset($_POST["command"])){
        $command = $_POST["command"];

        switch ($command){
            case 'ls':
                $list = llistar($actual_path);
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
            default:
                $list = ['Command not found'];
                $_SESSION['answer'] = $list;


        }
    }
    header('Location: consola.php');

}

?>
