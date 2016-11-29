<?php
/**
 * Created by PhpStorm.
 * User: Aqui
 * Date: 29-11-16
 * Time: 15:17
 */
include "Constante.php";
$getid=$_POST['mail'];
$req = $bdd->prepare('Select mpp.id_m_p as id_m_p, p.addresseImg, p.nomPlantes, p.description, mpp.humidite as humidite, mpp.doses as doses, mpp.temperature as temperature, mpp.humiditeSol as humiditeSol, mpp.heures as heures, mpp.cycle as cycle 
        from membre_possede_plante as mpp INNER JOIN membres as m on mpp.id_membres=p.id where m.mail = ?');
$req->execute(array($getid));
$info =$req->fetch();
echo $info['humidite'].";".$info['doses'].";".$info['temperature'].";".$info['humiditeSol'].";".$info['heures'].";".$info['cycle'];
?>
