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
$title='Informes'; $js=true;//solicito archivos javascript a head.php
session_start();
$bootstrapcss='../../css/bootstrap.min.css';
$css='../../css/style.css';
$jqurl='../../js/jquery.js';
$jsbs='../../js/bootstrap.min.js';
$close= "../../utilities/logout_user.php";
$img="../../img/user-a.png";
$logo="../../img/lablogo.svg";
include_once('../../layout/head.php');
require_once ('../../utilities/bd_utilities.php');
require_once ('../../utilities/info.php');

if(!$_SESSION || $_SESSION['IdModulo']!=4){
    header('Location: ../');//si no hay sesion lo devuelvo al login
}

function dependencias_op(){
    global $mysqli;
    $sql= "SELECT IdDependencia, NameDependencia FROM dependencias";
    $result = $mysqli->query($sql);

    while($data = $result->fetch_assoc()){?>
        <option value="<?php echo $data['IdDependencia'] ?>"><?php echo $data['NameDependencia'] ?></option>
    <?php  }
    $result->free();//liberar resultados
    //$mysqli->close();//cierro conexion
}

$dependencia= isset($_GET['dependencia'])? $_GET['dependencia']: "todas" ;
$tipopersonal=isset($_GET['modulo'])? $_GET['modulo']: "0" ;
$cedula=isset($_GET['cedula'])? $_GET['cedula']: "0" ;
?>

<body class="site">

<main class="content flex">
    <header>
        <?php require_once ('../../layout/nav.php'); ?>
        <ol class="breadcrumb">
            <li><a href="../">Inicio</a></li>
            <li class="active">Informes</li>
        </ol>
    </header>
    <div class="my-line-form">
        <form action="" class="form-inline" method="get">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        Dependencias:
                    </span>

                    <select class="form-control" name="dependencia" required>
                        <option value="todas">Todas</option>
                        <?php dependencias_op(); ?>
                    </select>

                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        Tipo de Personal:
                    </span>

                    <select class="form-control" name="modulo" required>
                        <option value="0">Todos</option>
                        <option value="1">Personal Adminsitrativo</option>
                        <option value="2">Personal Misional</option>
                        <option value="3">Visitante</option>
                    </select>

                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        Cedula:
                    </span>
                    <input type="number" class="form-control" min="1" placeholder="Numero de cedula" name="cedula">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info" name="subject" value="1">Buscar</button>
            </div>

            <div class="form-group">

                    <button type="submit" formtarget="_blank" class="btn btn-danger" name="subject" value="2">Exportar a PDF</button>

            </div>

        </form>
    </div>

    <div class="tabla table-responsive">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Genero</th>
                    <th>Profesion</th>
                    <th>Cargo</th>
                    <th>Dependencia</th>
                    <th>Hora Ingreso</th>
                    <th>Hora Salida</th>
                    <th>Modulo</th>
                </tr>
            </thead>
            <tbody>
            <?php consulta($dependencia,$tipopersonal,$cedula); ?>
            </tbody>
        </table>

    </div>

</main>

<?php include_once ('../../layout/footer.php'); ?>

</body>

</html>
