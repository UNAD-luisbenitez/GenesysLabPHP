<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 3/05/2016
 * Time: 9:49 AM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */
/*Permite registrar un nuevo usuario*/
require_once ('./bd_utilities.php');

$exe= isset($_POST['exe'])  ? intval($_POST['exe']) : '0';
$cedula= isset($_POST['cedula']) ? intval($_POST['cedula']): 0;
$nombre= isset($_POST['nombre']) ? $_POST['nombre']:'';
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos']:'';
$gen = isset($_POST['gen']) ? ($_POST['gen']):'';
$dependencia = isset($_POST['dependencia']) ? intval($_POST['dependencia']):'';
$modulo = isset($_POST['modulo']) ? intval($_POST['modulo']):'';
$profesion = isset($_POST['profesion']) ? $_POST['profesion']:'';
$cargo = isset($_POST['cargo']) ? intval($_POST['cargo']):'vacio';

//comrpobaciones para mejorar la consistencia de datos

function recoge(){

    global $mysqli;
    global $cedula,$nombre,$apellidos,$gen,$modulo,$profesion,$dependencia,$cargo;

    if((!empty($cedula) && !empty($nombre)) && ($gen=="masculino" || $gen=="femenino")){

        $sql="INSERT INTO personas(IdPersonas,NamePersonas,ApellidoPersonas,GeneroPersonas,
ProfesionPersonas,Cargos_IdCargo,Dependencias_IdDependencia,Modulos_IdModulos) VALUES ({$cedula},'{$nombre}','{$apellidos}','{$gen}','{$profesion}',{$cargo},{$dependencia},{$modulo})";

        $result = $mysqli->query($sql);
        if($mysqli->affected_rows>0){
            header('Location: ..?loginerror=11');
        } else{//error (no se afecto ningun columna) puede que el id ya exista
            header('Location: ../new_user?insert=2');
        }

    }else{
        header('Location: ../new_user?insert=3');
    }

}

if($exe==1){
    recoge();
}else{
    header('Location: ../');
}

?>


