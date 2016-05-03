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
session_destroy();
header('Location: ../');
?>