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
?>
<body class="centrado-box" id="green-2">
<div class="content"><!-- contenido aqui -->

    <div class="login">

        <div class="logo">
            <img src="../img/lablogo.svg" alt="GenesysLab" title="GenesysLab" width="96px"/>
            <h4>Genesys Lab <small>Administracion</small></h4>
        </div>

        <form class="form-horizontal" method="post">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </span>
                    <input type="number" class="form-control" placeholder="Numero de cedula" aria-describedby="basic-addon1" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                    </span>
                    <input type="password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1" required>
                </div>
            </div>

            <div class="form-group centrado-box">
                <button type="submit" class="btn btn-success">Ingresar</button>
            </div>

        </form>
    </div><!-- fin login -->

</div><!-- fin de contenido aqui -->
</body>
</html>
