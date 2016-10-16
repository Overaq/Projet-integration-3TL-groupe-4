<?php
/**
 * Created by PhpStorm.
 * User: Aqui
 * Date: 16-10-16
 * Time: 15:28
 */
session_start();
$_SESSION=array();
session_destroy();
header("Location:connexion.php");
?>