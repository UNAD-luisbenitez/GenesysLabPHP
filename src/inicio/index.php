<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 27/04/2016
 * Time: 11:15 PM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */
?>
<!doctype html>
<html lang="es">

<?php
$title='Inicio'; $js=true;//solicito archivos javascript a head.php

include_once('../layout/head.php');
require_once ('../utilities/bd_utilities.php');
session_start();

if(!$_SESSION){
    header('Location: ../');//si no hay sesion lo devuelvo al login
}

$nameuser = $_SESSION['NamePersonas'];
$moduloid = $_SESSION['IdModulo'];
$modulo= $_SESSION['NameModulo'];
?>

<body class="site">

<main class="content flex">
    <header>
        <?php require_once ('../layout/nav.php'); ?>
        <?php require_once ('../layout/jumbotron.php'); ?>
    </header>
    <!--Aqui se incluyen las vistas-->
        <?php
        switch($moduloid){
            case 1:
                require_once ('../layout/modules/administrativo.php');
                break;
            case 2:
                require_once ('../layout/modules/misional.php');
                break;
            case 3:
                require_once ('../layout/modules/visitante.php');
                break;
            case 4:
                require_once ('../layout/modules/admin.php');
                break;
        }
        ?>
</main>

<?php include_once ('../layout/footer.php'); ?>

</body>

</html>
