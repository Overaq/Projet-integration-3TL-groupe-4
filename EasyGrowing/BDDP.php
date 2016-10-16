<?php
session_start();
include "Constante.php";
$bddP->exec('SET NAMES utf8');
$reqPlantes = $bddP->prepare("SELECT * FROM plantes ");
$reqPlantes->execute();
$tableau="";
while($plantesinfo =$reqPlantes->fetch()){
    $tableau.="    <tr>
                    <td><img class=\"tb_BDDP_img\" src=\"img_Plantes/".$plantesinfo['addresseImg']."\" alt=\"".$plantesinfo['nomPlantes']."\"></td>
                    <td>".$plantesinfo['nomPlantes']."</td>
                    <td>description</td>
                   </tr>";
}
echo "
<!Doctype html>
<html>
	".$head."
	<body>
		".$header."
		<main>
			<div class=\"main\" id=\"BDDP\">
				<h1>Base de donnée plantes</h1>
				".$plantesinfo['nomPlantes']."
				<Table id='tb_BDDP'>
				    <tr>
				        <th class='td_BDDP'>Photo</th>
				        <th class='td_BDDP'>Nom de la plante</th>
				        <th class='td_BDDP'>Descriptions</th>
				        <th class='td_BDDP'><a href='#'>Téléchargements</a></th>
				    </tr>
				    ".$tableau."
				</Ttable>
			</div>
		</main>
	</body>
</html>
"
?>