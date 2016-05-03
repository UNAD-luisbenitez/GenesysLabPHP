<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 2/05/2016
 * Time: 5:36 PM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */
/*se destruye la sesion de usuario*/
session_start();

require_once ('./bd_utilities.php');

function registra_salida(){//permite registrar la salida de usuario en la BD
    global $mysqli;
    $Personas_IdPersonas = $_SESSION['IdPersonas'];
    $datesale = date("Y-m-d h:i:s");
    $serial = $_SESSION['SerialHistorial'];

    if(!empty($Personas_IdPersonas)){//si la variable no esta vacia
        $sql="UPDATE historiales SET HoraSalida='{$datesale}' WHERE SerialHistorial={$serial}";
        $result = $mysqli->query($sql);
    }
}
registra_salida();
session_destroy();
header('Location: ../');
?>