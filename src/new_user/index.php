<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 28/04/2016
 * Time: 11:28 PM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 * Pantalla para crear nuevo registro de usuario
 */
?>
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
<body class="centrado-box" id="green-3">
<div class="content"><!-- contenido aqui -->

    <div class="login">

        <div class="logo">
            <img src="../img/lablogo.svg" alt="GenesysLab" title="GenesysLab" width="96px"/>
            <h4>Genesys Lab <small>Nuevo Usuario</small></h4>
        </div>

        <form class="form-horizontal" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        Cedula:
                    </span>
                    <input type="number" class="form-control" min="1" placeholder="Numero de cedula" name="cedula" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        Nombre:
                    </span>
                    <input type="text" class="form-control" placeholder="Tu nombre" name="nombre" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        Apellidos:
                    </span>
                    <input type="text" class="form-control" placeholder="tus apellidos" name="apellidos">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        Genero:
                    </span>

                    <div class="radio">
                        <label>
                            <input type="radio" name="gen" id="r1" value="femenino" checked required>
                            Femenino
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="gen" id="r2" value="masculino" required>
                            Masculino
                        </label>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        Modulo:
                    </span>

                    <select class="form-control" name="modulo" required>
                        <option value="1">Personal Adminsitrativo</option>
                        <option value="2">Personal Misional</option>
                        <option value="3">Visitante</option>
                    </select>

                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        Profesion:
                    </span>
                    <input type="text" class="form-control" placeholder="Tu profesion" aria-describedby="basic-addon1">
                </div>
            </div>

            <fieldset disabled>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        Foto:
                    </span>
                    <input type="file" name="foto" id="fileToUpload" accept="image/*">
                </div>
            </div>
            </fieldset>

            <div class="form-group centrado-box">
                <div class="input-group">
                    <button type="button" class="btn btn-default">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear Usuario</button>
                </div>
            </div>

        </form>
    </div><!-- fin login -->

</div><!-- fin de contenido aqui -->
</body>
</html>

