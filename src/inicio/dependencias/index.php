<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 4/05/2016
 * Time: 11:33 PM
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
include_once('../../layout/head.php');
require_once ('../../utilities/bd_utilities.php');

if(!$_SESSION || $_SESSION['IdModulo']!=4){
    header('Location: ../');//si no hay sesion lo devuelvo al login
}

function dependencias_full(){
    global $mysqli;
    $sql= "SELECT * FROM dependencias";
    $result = $mysqli->query($sql);

    while($data = $result->fetch_assoc()){?>
        <tr>
            <td><?php echo $data['IdDependencia']; ?></td>
            <td><?php echo $data['NameDependencia']; ?></td>
            <td><?php echo $data['DescripcionDependencia']; ?></td>
        </tr>
    <?php  }
    $result->free();//liberar resultados
    //$mysqli->close();//cierro conexion
}

?>

<body class="site">

<main class="content flex">
    <header>
        <?php require_once ('../../layout/nav.php'); ?>
        <ol class="breadcrumb">
            <li><a href="../">Inicio</a></li>
            <li class="active">dependencias</li>
        </ol>
    </header>
    <div class="my-line-form">

    </div>

    <div class="tabla table-responsive">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id Dependencia</th>
                <th>Nombre </th>
                <th>Descripcion</th>
                <th>Opciones</th><!--vas a tener dos archivos uno para eliminar, otro para editar el de eliminar solo lo llamaras con un link tomara datos y recargara conlocation el de editar si necesita una nueva pagina-->
            </tr>
            </thead>
            <tbody>
            <?php dependencias_full(); ?>
            <form action="../../utilities/create_dependencia.php" class="form-inline" method="post">
            <tr>
                <td>
                    <input type="number" class="form-control" min="1" max="255" placeholder="Id" name="IdDependencia" required>
                </td>
                <td>
                    <input type="text" class="form-control"  placeholder="Nombre" name="NameDependencia" required>
                </td>
                <td>
                    <input type="text" class="form-control"  placeholder="Descripcion" name="Descrip">
                </td>
                <td>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </td>
            </tr>
            </form>
            </tbody>
        </table>

    </div>

</main>

<?php include_once ('../../layout/footer.php'); ?>

</body>

</html>

