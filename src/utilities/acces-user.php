<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 29/04/2016
 * Time: 1:26 PM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */
/*Desde esta pagina se valida el acceso de usuarios*/
session_start();
require_once ('./bd_utilities.php');

/*------------------- Funciones para validar el acceso y crear la sesion*/
$form = isset($_POST['form']) ? ($_POST['form']):'0';

function Name_Modulo($modulo){/*Trae el nombre de modulo directamente de la Base de datos*/
    global $mysqli;

    $sql = "SELECT NameModulo FROM modulos WHERE IdModulo={$modulo}";
    $result = $mysqli->query($sql);
    $data = $result->fetch_assoc();

    $NombreModulo= $data['NameModulo'];
    return $NombreModulo;
}

function valida_user(){

    $IdPersonas = intval($_POST['IdPersonas']);
    $Modulos_IdModulos = intval($_POST['modulo']);
    global $mysqli;

    if(!empty($IdPersonas)){//si la variable NO esta vacia
        $sql = "SELECT * FROM personas WHERE IdPersonas = {$IdPersonas} AND Modulos_IdModulos = {$Modulos_IdModulos}";
        $result = $mysqli->query($sql);

        if($result->num_rows){//si encuentra datos que coinciden
            $data = $result->fetch_assoc();

            $_SESSION['IdPersonas'] = $data['IdPersonas'];
            $_SESSION['NamePersonas'] = $data['NamePersonas'];
            $_SESSION['IdModulo'] = $data['Modulos_IdModulos'];
            $modulo = $_SESSION['IdModulo'];

            //-----Obtengo nombre de Modulo directamente de la BD
            $_SESSION['NameModulo']= Name_Modulo($modulo);

            header('Location: ../inicio');
        }else{
            header('Location: ..?loginerror=1');
        }


    }
}

function valida_admin(){
    $IdAdmin = intval($_POST['IdAdmin']);
    $PassAdmin = sha1($_POST['PassAdmin']);
    global $mysqli;

    if(!empty($IdAdmin)){//desemcrito la pass en la BD
        $sql= "SELECT * FROM systemadmins WHERE IdAdmin='{$IdAdmin}' AND PassAdmin='{$PassAdmin}'";

        $result = $mysqli->query($sql);

        if($result->num_rows){//si encuentra datos que coinciden
            $data = $result->fetch_assoc();

            $_SESSION['NamePersonas'] = $data['NombreAdmin'];
            //Los modulos se definen a mano (no se tuvo en cuetna en el diseño de la BD)
            $_SESSION['IdModulo'] = 4;
            $_SESSION['NameModulo']= 'SuperUsuario';

            header('Location: ../inicio');
        } else{
            header('Location: ../admin?loginerror=1');
        }
    }

}

/*-------------------------------- Fin funciones validacion-------------------*/
switch ($form) {
    case '1':
        valida_admin();
        break;

    case '2':
        valida_user();
        break;

    default:
        header('Location: ../');
        break;
}
?>

