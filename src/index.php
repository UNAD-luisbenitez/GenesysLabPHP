<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 26/04/2016
 * Time: 12:03 AM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */
session_start();
if($_SESSION){//si hay una sesion activa
    header('Location: ./inicio');
}
?>
<!doctype html>
<html lang="es">
    <?php
    $bootstrapcss= 'css/bootstrap.min.css'; $title='GenesysLab:Inicio De Sesion';
    $css='css/style.css';
    include_once('layout/head.php');
    ?>
<body class="centrado-box" id="green-1">
<div class="content"><!-- contenido aqui -->

    <div class="login">

        <div class="logo">
                <img src="img/lablogo.svg" alt="GenesysLab" title="GenesysLab" width="96px"/>
                <h4>Genesys Lab <small>Inicio De Sesion</small></h4>
        </div>

        <form class="form-horizontal" method="post" action="utilities/acces-user.php">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </span>
                    <input type="number" class="form-control" placeholder="Numero de cedula" name="IdPersonas" required>
                </div>
            </div>

            <!-- panel de seleccion de interfaz -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4 select-modulo">

                        <div class="radio">
                            <label>
                                <input type="radio" name="modulo" id="optionsRadios1" value="1">
                                <img src="img/users_logo.svg" alt="Personal Administrativo">
                                <p>Personal Administrativo</p>
                            </label>
                        </div>

                    </div>
                    <div class="col-md-4 select-modulo">

                        <div class="radio">
                            <label>
                                <input type="radio" name="modulo" id="optionsRadios2" value="2">
                                <img src="img/user_logo.svg" alt="Personal Misional">
                                <p>Personal Misional</p>
                            </label>
                        </div>

                    </div>
                    <div class="col-md-4 select-modulo">

                        <div class="radio">
                            <label>
                                <input type="radio" name="modulo" id="optionsRadios2" value="3" checked>
                                <img src="img/id_logo.svg" alt="Visitante">
                                <p>Visitante</p>
                            </label>
                        </div>

                    </div>
                </div>

            </div>
            <!-- Fin panel de seleccion de interfaz -->

            <div class="form-group centrado-box">
                <button type="submit" class="btn btn-success">Ingresar</button>
            </div>

            <div class="form-group right-box">
                <a href="./admin">Acceso SuperUsuario</a>
            </div>

            <input type="hidden" name="form" value="2">
        </form>
        <div class="centrado-box">
            <a href="./new_user">Crear Usuario</a>
        </div>
    </div><!-- fin login -->

</div><!-- fin de contenido aqui -->

<script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">


<!-- Muestro ventana de error en login -->
<?php
if(isset($_GET['loginerror'])){
    $code_error= $_GET['loginerror'];
    switch($code_error){
        case 1:?>
            <script>/*utilizando el plugin sweet alert*/
                swal({
                        title: "¡Los datos no coinciden!",
                        text: "La combinacion de cedula y modulo que ingresaste no coinciden",
                        type: "error",
                        showCancelButton: true,
                        confirmButtonColor: "#449d44",
                        confirmButtonText: "Crear nuevo usuario",
                        closeOnConfirm: false
                    },
                    function(){
                        window.location.href = './new_user';
                    });
            </script>
            <?php break;
        case 11: ?>

            <script>
                swal("Usuario Creado", "Ingresa con tu nuevo usuario", "success");
            </script>
            <?php break;
        default:
            break;
    }
}
?>

</body>
</html>
