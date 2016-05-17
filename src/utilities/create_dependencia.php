<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 5/05/2016
 * Time: 8:49 PM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */
session_start();
if($_SESSION['IdModulo']!=4){
    header('Location: ../');//si no hay sesion lo devuelvo al login
}
require_once ('./bd_utilities.php');

$IdDependencia= isset($_POST['IdDependencia'])? intval($_POST['IdDependencia']): 0;
$NameDependencia= isset($_POST['NameDependencia'])?($_POST['NameDependencia']) : '0';
$DescripDependencia= isset($_POST['Descrip'])?($_POST['Descrip']) :'0';
function insertar($IdDependencia, $NameDependencia, $DescripDependencia){
    global $mysqli;

    $sql= "INSERT INTO dependencias(IdDependencia,NameDependencia,DescripcionDependencia) VALUES ({$IdDependencia},'{$NameDependencia}','{$DescripDependencia}')";

    if(empty($IdDependencia) || empty($NameDependencia) ){
        echo "<br>","Parametros vacios";
        //header('Location: ../inicio/dependencias?info=3');
    }

    $result = $mysqli->query($sql);

    if($mysqli->affected_rows>0){
        header('Location: ../inicio/dependencias?info=1');//SE REGISTRO
    } else{//error (no se afecto ningun columna) puede que el id ya exista
        header('Location: ../inicio/dependencias?info=2');
    }
}

insertar($IdDependencia,$NameDependencia,$DescripDependencia);

?>