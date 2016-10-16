<?php
/**
 * Created by PhpStorm.
 * User: aquilain
 * Date: 13/10/2016
 * Time: 12:34
 */
$head="
    <head>
		<meta charset=\"utf-8\">
		<title>EasyGrowing</title>
		<link href=\"index.css\" rel=\"stylesheet\" type=\"text/css\">
	</head>
";
$header="
    <header>
        <a href=\"index.php\">
            <div id=\"logo\">
                EasyGrowing
            </div>
        </a>
        <ul>
            <li><a href=\"BDDP.php\">Base de donnée plantes</a></li>
            <li>".monProfil()."</li>
            <li><a href=\"index.php\">Accueil</a></li>
        </ul>
        <div class=\"clear\"></div>
    </header>
";
function monProfil (){
    if (isset($_SESSION['id'])){
        $numProfils=$_SESSION['id'];
        echo "<a href=\"profil.php?id=$numProfils\">MonProfil</a>";
    }
    else{
        echo "<a href=\"connexion.php\">Connexion</a>";
    }
}
?>
