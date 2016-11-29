<?php
/**
 * Created by PhpStorm.
 * User: Aqui
 * Date: 29-11-16
 * Time: 15:17
 */
include "Constante.php";
$getid=$_GET['id'];
$req = $bdd->prepare('select * From plantes Where id = ?');
$req->execute(array($getid));
$info =$req->fetch();
echo $info['humidite'].";".$info['doses'].";".$info['temperature'].";".$info['humiditeSol'].";".$info['heures'].";".$info['cycle'];
?>
