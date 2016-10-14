<?php
/**
 * Created by PhpStorm.
 * User: aquilain
 * Date: 13/10/2016
 * Time: 12:48
 */
include "headerFooter.php";
echo"
<!Doctype html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <title>EasyGrowing</title>
        <link href=\"index.css\" rel=\"stylesheet\" type=\"text/css\">
    </head>
    <body>
        ".$header."
    <main>
        <div class=\"main\" id=\"connexion\">
            <h1>Connexion</h1>
            <form method=\"post\" action=\"\">
                <div class=\"form-group\">
                    <label class=\"col-lg-2 control-label\">Login</label>
                    <div class=\"col-lg-10\">
                        <input type=\"text\" class=\"form-control\" name=\"login\" placeholder=\"Login\">
                    </div>
                    <br>
                </div>
                <div class=\"form-group\">
                    <label class=\"col-lg-2 control-label\">Mot de passe</label>
                    <div class=\"col-lg-10\">
                        <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"Mot de passe\">
                    </div>
                    <br>
                </div>
                <center>
                    <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Connexion</button>
                </center>
            </form>
        </div>
    </main>
        ".$footer."
    </body>
</html>
";
// on se connecte à MySQL
$db = mysql_connect('137.74.169.129', 'root', 'L3ff3L3ff3');
mysql_select_db('EasyGrowing',$db);

if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['password'])) {
    $_POST['password'] = hash("sha256", $_POST['password']);
    extract($_POST);
    // on recupére le password de la table qui correspond au login du visiteur
    $sql = "select password from membre where login='".$login."'";
    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

    $data = mysql_fetch_assoc($req);

    if($data['password'] != $password) {
        echo '<div class="alert alert-dismissable alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Oh Non !</strong> Mauvais login / password. Merci de recommencer !
</div>';
    }

    else {
        session_start();
        $_SESSION['login'] = $login;

        echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Yes !</strong> Vous etes bien logué, Redirection dans 5 secondes ! <meta http-equiv="refresh" content="5; URL=dashboard">
</div>';
        // ici vous pouvez afficher un lien pour renvoyer
        // vers la page d'accueil de votre espace membres
    }
}
else {
    $champs = '<p><b>(Remplissez tous les champs pour vous connectez !)</b></p>';
}
?>
