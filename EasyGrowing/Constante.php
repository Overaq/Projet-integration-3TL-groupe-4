<?php
/**
 * Created by PhpStorm.
 * User: aquilain
 * Date: 13/10/2016
 * Time: 12:34
 */
$nomPage=$_SERVER['REQUEST_URI'];
$nomPage=str_replace(".php"," ", $nomPage);
$nomPage=explode(" " , $nomPage);
$nomPage=str_replace("/"," ", $nomPage);
$head="
    <head>
		<meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;\" />
		<meta charset=\"utf-8\">
		<title>".$nomPage['0']."</title>		
		<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\"/>
        	<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js\"></script>
        	<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
		<link href=\"index.css\" rel=\"stylesheet\" type=\"text/css\">
		<link rel=\"icon\" type=\"image/png\" href=\"EG.PNG\" />	
</head>
";
$header="
    <nav class=\"nabar navbar-inverse\">
        <div class=\"container-fluid\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#menu\">
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>					
                </button>
                <a class=\"navbar-brand\" href='index.php'>EasyGrowing</a>
            </div>
            <div class=\"collapse navbar-collapse\" id=\"menu\">
                <ul class=\"nav navbar-nav navbar-right\">
                    <li class=\"\">".monProfil()."</li>
                     <li class=\"\">
                        <a href=\"NotreProduit.php\">Notre produit</a>
                    </li>
                    <li class=\"\">
                        <a href=\"BDDP.php\">Nos Plantes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
";
function monProfil (){
    if (isset($_SESSION['id'])And $_SESSION['id']==1){
        $numProfils=$_SESSION['id'];
        return "<a href=\"deconnexion.php\">Déconnexion</a>
                <li class=\"\"><a href=\"profil.php?id=$numProfils\">MonProfil</a></li>
                <li class=\"\"><a href=\"http://vps319254.ovh.net/phpmyadmin/\">Administration</a></li>";
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
/*$bdd = new PDO('mysql:host=127.0.0.1;dbname=EasyGrowing', 'root', '');*/
$bdd->exec('SET NAMES utf8'); ?>
