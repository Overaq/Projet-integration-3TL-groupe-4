<?php
/**
 * Created by PhpStorm.
 * User: aquilain
 * Date: 13/10/2016
 * Time: 12:34
 */
$nomPage=SUBSTR($_SERVER['REQUEST_URI'],51);
$nomPage=str_replace(".php"," ", $nomPage);
$nomPage=explode(" " , $nomPage);
$head="
    <head>
		<meta charset=\"utf-8\">
		<title>EasyGrowing".$nomPage['0']." </title>
		<link href=\"index.css\" rel=\"stylesheet\" type=\"text/css\">
        <script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js\"></script>
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
$bdd = new PDO('mysql:host=127.0.0.1;dbname=EasyGrowing', 'root', '');
$bdd->exec('SET NAMES utf8');
?>
