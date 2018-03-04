<?php

include 'constants.inc.php';
include 'sistema.inc.php';
include 'directoris.inc.php';
include 'arxius.inc.php';

session_start();

$command = "";
$actual_path = BASE;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["command"]) | !isset($_POST["command"])) {
        $command = $_POST["command"];


        $comando = explode(' ', $command);
        $nameCommand = strtolower($comando[0]);

        switch ($nameCommand) {
            case 'ls':
                $dir = $comando[1];
                $list = llistar($dir);
                $_SESSION['answer'] = $list;
                break;
            case 'pwd':
                $path = ruta();
                $_SESSION['answer'] = $path;
                break;
            case '':
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
            case 'mv':
                if ($comando[1] == '-d') {
                    $dir = $comando[2];
                    $rutadesti = $comando[3];
                    $mv = mou_directori($dir, $rutadesti);
                    $_SESSION['answer'] = $mv;
                }elseif ($comando[1]=='-f'){
                    $fitxer = $comando[2];
                    $rutadesti = $comando[3];
                    $mv = mou_fitxer($fitxer, $rutadesti);
                    $_SESSION['answer'] = $mv;
                }else{
                    $errorMessage = 'Command not found';
                    $_SESSION['answer']=$errorMessage;
                }

                break;
            case 'cp':
                if ($comando[1] == '-d') {
                    $dir = $comando[2];
                    $rutadesti = $comando[3];
                    $cp = copia_directori($dir, $rutadesti);
                    $_SESSION['answer'] = $cp;
                }elseif ($comando[1]=='-f'){
                    $fitxer = $comando[2];
                    $rutadesti = $comando[3];
                    $cp = copia_fitxer($fitxer, $rutadesti);
                    $_SESSION['answer'] = $cp;
                }else{
                    $errorMessage = 'Command not found';
                    $_SESSION['answer']=$errorMessage;
                }
                break;
            case 'sha1':
                $fitxer = $comando[1];
                $sha1 = sha1_fitxer($fitxer);
                $_SESSION['answer'] = $sha1;

                break;
            case 'md5':
                $fitxer = $comando[1];
                $md5 = md5_fitxer($fitxer);
                $_SESSION['answer']=$md5;
                break;
            case 'find':
                $fitxer = $comando[1];
                $dir = $comando[2];
                $find = find_fixer($fitxer, $dir);
                $_SESSION['answer'] = $find;
                break;
            case 'stats':
                $fitxer = $comando[1];
                $stats = stats_fitxer($fitxer);
                $_SESSION['answer'] = $stats;

                break;

            case 'help':

                $help = 'ls (Muestra los contenidos de la carpeta)<br><br>
                         pwd (Muestra la ruta actual)<br><br>
                         fdisk (Muestra uso de disco duro)<br><br>
                         mkdir DIRECTORIO(Crear carpeta)<br><br>
                         rm -d DIRECTORIO(Eliminar carpeta)<br>
                         &nbsp&nbsp&nbsp-f ARCHIVO(Eliminar archivo)<br><br>
                         mv -d DIRECTORIO(Mover carpeta)<br>
                         &nbsp&nbsp&nbsp-f ARCHIVO(Mover archivo)<br><br>
                         cp -d DIRECTORIO(Copiar carpeta)<br>
                         &nbsp&nbsp&nbsp-f ARCHIVO(Copiar archivo)<br><br>
                         find ARCHIVO RUTA(Buscar un archivo en la ruta especifica)<br><br>
                         stats ARCHIVO(Muestra estado del archivo)<br><br>
                         vim ARCHIVO CONTENIDO(Crea archivo si no existeo modifica el archivo si el contenido son diferente<br><br>
                         sha1 ARCHIVO(Devuelve el hash sha1 del archivo)<br><br>
                         md5 ARCHIVO(Devuelve el hash md5 del archivo)<br><br>';
                $_SESSION['answer'] = $help;
                break;
            case 'vim':
                $fixer = $comando[1];
                $contigut = $comando[2];
                $vim = crea_modifica_fixer($fixer,$contigut);
                $_SESSION['answer'] = $vim;
                break;
            default:
                $list = ['Command not found'];
                $_SESSION['answer'] = $list;


        }
    }
    header('Location: consola.php');

}

?>
