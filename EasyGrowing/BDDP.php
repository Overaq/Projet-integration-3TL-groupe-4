<?php
session_start();
include "Constante.php";
$bddP->exec('SET NAMES utf8');
$reqPlantes = $bddP->prepare("SELECT * FROM plantes ");
$reqPlantes->execute();
$tableau="";
$i=1;
while($plantesinfo =$reqPlantes->fetch()){
    if ($i==1){
        $tableau.="<tr>";
        $i++;
    }
    elseif ($i==4){
        $tableau.="</tr>";
        $i=1;
    }
    else {$i++;}
    $tableau.="
        <td>
            <a href =\"plante.php?id=".$plantesinfo['id']."\">
                <img class=\"tb_BDDP_img\" src=\"img_Plantes/".$plantesinfo['addresseImg']."\" alt=\"".$plantesinfo['nomPlantes']."\">
            </a>
        </td>
    ";
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
				<Table id='tb_BDDP'>
				    <tbody>
				    ".$tableau."
				    </tbody>
				</Ttable>
			</div>
		</main>
	</body>
</html>
"
?>
