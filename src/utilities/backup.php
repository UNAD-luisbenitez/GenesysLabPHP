<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 7/05/2016
 * Time: 12:02 AM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */
session_start();
if($_SESSION['IdModulo']!=4){
    header('Location: ../');//si no hay sesion lo devuelvo al login
}

require_once ('./bd_utilities.php');
$user= "root";//nombre usuario
$pass= "unad1234";//pass de servidor
$bdname= "bd_genesyslab";//nombre base de datos
$backupfile=$bdname;
$path = '"E:\backups_genesyslab.sql"';//Donde guardamos el archivo
$dump = '"E:\servers\XAMPP\mysql\bin\mysqldump.exe"';//variable DUmp
//ejecutamos la sentencia
system("$dump --no-defaults -u $user -p$pass $bdname > $path");
echo "Copia OK guardada en: ",$path;
?>