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
    if (isset($_SESSION['id'])And $_SESSION['id']==1){
        $numProfils=$_SESSION['id'];
        return "<a href=\"deconnexion.php\">Déconnexion</a>
                <li><a href=\"profil.php?id=$numProfils\">MonProfil</a></li>
                <li><a href=\"http://vps319254.ovh.net/phpmyadmin/\">Administration</a></li>";
    }
    elseif (isset($_SESSION['id'])){
        $numProfils=$_SESSION['id'];
        return "<a href=\"deconnexion.php\">Déconnexion</a><li><a href=\"profil.php?id=$numProfils\">MonProfil</a></li>";
    }
    else{
        return "<a href=\"connexion.php\">Connexion</a>";
    }
};
$bdd = new PDO('mysql:host=137.74.169.129;dbname=EasyGrowing', 'root', 'L3ff3L3ff3');
$bdd->exec('SET NAMES utf8');
?>
