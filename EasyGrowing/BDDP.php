<?php
session_start();
include "Constante.php";
$tableau="";
$i=1;
$reqPlantes;
if (!isset($_POST['recherche'])){
    $reqPlantes = $bdd->prepare("SELECT * FROM plantes ");
    $reqPlantes->execute();
}
elseif (isset($_POST['recherche'])) {
    $recherche = "%" . $_POST['recherche_de_plante'] . "%";
    $reqPlantes = $bdd->prepare("SELECT * FROM plantes WHERE nomPlantes LIKE ? ");
    $reqPlantes->execute(array($recherche));
}
while($plantesinfo =$reqPlantes->fetch()){
    if ($i==1){
        $tableau.="<tr>";
        $i++;
    }
    elseif ($i==5){
        $tableau.="</tr><tr>";
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
echo $tableau;
echo "
<!Doctype html>
<html>
	".$head."
	<body>
		".$header."
		<main>
			<div class=\"main\" id=\"BDDP\">
				<br>
				<h1>Base de données plantes</h1>
				    <div id=\"rechercheform\">
                        <form method=\"POST\" action=\"\">
                            <br>
                            <label for=\"recherche_de_plante\">Recherche par nom : </label> 
                            <input id=\"recherche_de_plante\" type=\"text\" name=\"recherche_de_plante\"  placeholder=\"Votre recherche\" >
                            <input type=\"submit\" name=\"recherche\" value=\"Rechercher\">
                            <br><br>
                        </form>
                    </div>
				<Table id='tb_BDDP'>
				    <thead>
				        <tr>
				            <th></th>
				            <th></th>
				            <th></th>
				            <th></th>
				        </tr>
				    </thead>
				    <tbody>
				    ".$tableau."
				    </tbody>
				</table>
			</div>
		</main>
	</body>
</html>
"
?>
