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
?>
<body class="site">

<main class="content flex">
    <header>
        <?php require_once ('../layout/nav.php'); ?>
        <?php require_once ('../layout/jumbotron.php'); ?>
    </header>
    <!--Aqui se incluyen las vistas-->
        <?php
        require_once ('../layout/modules/admin.php');
        //require_once ('../layout/modules/visitante.php');
        //require_once ('../layout/modules/administrativo.php');
        //require_once ('../layout/modules/misional.php');
        ?>
</main>

<?php include_once ('../layout/footer.php'); ?>

</body>

</html>
