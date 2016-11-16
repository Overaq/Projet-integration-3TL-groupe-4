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
		<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\"/>
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js\"></script>
        <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
		<link href=\"index.css\" rel=\"stylesheet\" type=\"text/css\">
        <script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js\"></script>
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
                <a class=\"navbar-brand\" href='#'>EasyGrowing</a>
            </div>
            <div class=\"collapse navbar-collapse\" id=\"menu\">
                <ul class=\"nav navbar-nav navbar-right\">
                    <li class=\"\">
                        <a href=\"#\">Connexion</a>
                    </li>
                    <li class=\"\">
                        <a href=\"#\">Nos Plantes</a>
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
