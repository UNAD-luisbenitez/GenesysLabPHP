<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 25/04/2016
 * Time: 11:36 PM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */
/*Conexion a la base de datos y funciones que son usadas por varias paginas del sitio
para acceder a la base de datos*/

require_once ('bd_credentials.php');
@$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);//conecto a la BD con constructor mysqli
//el @oculta el error (evita se conozca nombre de BD)
if($mysqli->connect_errno){//si tenemos errores en la conexion?>

<div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    <b><?php die('Error de Conexión (' . $mysqli->connect_errno . '</b>) '
        . $mysqli->connect_error);

    exit; ?>
</div>

<?php }?>