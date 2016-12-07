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
/**echo $_POST['data_hum'];
echo $_POST['data_temp'];*/
$insertmpp=$bdd->prepare('INSERT INTO data_membre(data_temp,data_hum,data_time,id_membre) SELECT ?,?,?, id from membres WHERE mail = ? ');
$insertmpp->execute(array(htmlspecialchars($_POST['data_temp']),htmlspecialchars($_POST['data_hum']),date('Y-m-d H:i:s'),htmlspecialchars($_POST['mail'])));

$req = $bdd->prepare('Select mpp.id_m_p as id_m_p, mpp.humidite as humidite, mpp.temperature as temperature,  mpp.heures as heures
        from membre_possede_plante as mpp INNER JOIN membres as m on mpp.id_membres=m.id where m.mail = ? ');
$req->execute(array($getid));
$info =$req->fetch();
$temp=$info['temperature'];
$humidMax=$info['humidite']+5;
$humidMin=$info['humidite']-5;
$hToI=$info['heures'];
$hToI=explode(":" , $hToI);
echo $temp.";\n".$humidMax.";\n".$humidMin.";\n".$hToI[0].";"
?>
