<?php
include "Constante.php";


$req = $bdd->prepare('Select mpp.id_m_p as id_m_p, mpp.humidite as humidite, mpp.temperature as temperature,  mpp.heures as heures
        from membre_possede_plante as mpp INNER JOIN membres as m on mpp.id_membres=m.id ');
$req->execute();
$info =$req->fetch();


echo $info['heures'];
$hToI=$info['heures'];
$hToI=explode(":" , $hToI);
echo $hToI[0];
?>
