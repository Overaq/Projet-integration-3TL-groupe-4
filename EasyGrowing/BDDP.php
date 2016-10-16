<?php
session_start();
include "Constante.php";
$bddP->exec('SET NAMES utf8');
$reqPlantes = $bddP->prepare("SELECT * FROM plantes join");
$reqPlantes->execute();
$tableau="";
while($plantesinfo =$reqPlantes->fetch()){
    $tableau.="    <tr>
                    <td><img src=\"img_Plantes/ ".$plantesinfo['addresseImg']."\" alt=\"".$plantesinfo['nomPlantes']."\"></td>
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
				<Table Borde='1'>
				    <tr>
				        <th>Photo</th>
				        <th>Nom de la plante</th>
				        <th>Descriptions</th>
				        <th><a href='#'>Téléchargements</a></th>
				    </tr>
				    ".$tableau."
				</Ttable>
			</div>
		</main>
	</body>
</html>
"
?>