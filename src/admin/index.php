<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 27/04/2016
 * Time: 10:08 PM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */
?>
<!doctype html>
<html lang="es">
<?php
$title='GenesysLab:Administrador';
include_once('../layout/head.php');
require_once ('../utilities/bd_utilities.php');

session_start();
if($_SESSION){//si hay una sesion activa
    header('Location: ../inicio');
}
?>
<body class="centrado-box" id="green-2">
<div class="content"><!-- contenido aqui -->

    <div class="login">

        <div class="logo">
            <img src="../img/lablogo.svg" alt="GenesysLab" title="GenesysLab" width="96px"/>
            <h4>Genesys Lab <small>Administracion</small></h4>
        </div>

        <form class="form-horizontal" method="post" action="../utilities/acces-user.php">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </span>
                    <input type="number" class="form-control" placeholder="Numero de cedula" name="IdAdmin" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                    </span>
                    <input type="password" class="form-control" placeholder="Contraseña" name="PassAdmin" required>
                </div>
            </div>

            <input type="hidden" name="form" value="1"><!-- Para validar en acces-user -->

            <div class="form-group centrado-box">
                <button type="submit" class="btn btn-success">Ingresar</button>
            </div>

        </form>
    </div><!-- fin login -->

    <script src="../js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">

    <?php
    if(isset($_GET['loginerror'])){
        $code_error= $_GET['loginerror'];
        switch($code_error){
            case 1:?>
                <script>/*utilizando el plugin sweet alert*/
                    sweetAlert("Oopss..!", "La combinacion de cedula y password que ingresaste no coinciden", "error");
                </script>
                <?php break;
            default:
                break;
        }
    }
    ?>

</div><!-- fin de contenido aqui -->
</body>
</html>
