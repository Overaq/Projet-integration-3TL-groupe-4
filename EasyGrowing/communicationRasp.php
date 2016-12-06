<?php
/**
 * Created by PhpStorm.
 * User: Aqui
 * Date: 29-11-16
 * Time: 15:17
 */
date_default_timezone_set('Europe/Brussels');
include "Constante.php";
$getid=htmlspecialchars($_POST['mail']);
echo $_POST['data_hum'];
echo $_POST['data_temp'];
$insertmpp=$bdd->prepare('INSERT INTO data_membre(data_temp,data_hum,data_time,id_membre) SELECT ?,?,?, id from membres WHERE mail = ? ');
$insertmpp->execute(array(htmlspecialchars($_POST['data_temp']),htmlspecialchars($_POST['data_hum']),date('Y-m-d H:i:s'),htmlspecialchars($_POST['mail'])));

$req = $bdd->prepare('Select mpp.id_m_p as id_m_p, mpp.humidite as humidite, mpp.doses as doses, mpp.temperature as temperature, mpp.humiditeSol as humiditeSol, mpp.heures as heures, mpp.cycle as cycle
        from membre_possede_plante as mpp INNER JOIN membres as m on mpp.id_membres=m.id where m.mail = ? ');
$req->execute(array($getid));
$info =$req->fetch();
echo $info['humidite'].";".$info['doses'].";".$info['temperature'].";".$info['humiditeSol'].";".$info['heures'].";".$info['cycle'];
?>
