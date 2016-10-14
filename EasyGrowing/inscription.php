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
        <div class=\"main\" id=\"inscription\">
            <h1>Inscription</h1>
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
                </div>
                <br>
                <center><button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">S'Inscrire</button></center>
            </form>
        </div>
    </main>
        ".$footer."
    </body>
</html>
";
//Connexion à la BDD
  try {
      $bdd = new PDO ('mysql:host=localhost;dbname=EasyGrowing', 'root', 'L3ff3L3ff3');
  }
  catch(Exception $e) {
      die('Erreur :'.$e->getMessage());
  }
  if(ISSET($_POST['submit'])) {
    //On créer les variables
    $login =   $_POST['login'];
    $password = $_POST['password'];
    $password = hash("sha256", $password);

    $req = $bdd->prepare('INSERT INTO membre(login, password) VALUES (:login, :password)');

    $req->execute(array("login" => $login, "password" => $password));

    if(!empty($login) && !empty($password)) {}
    else{
        ?>
        <b>Pseudo ou MDP vide !</b>
        <?php
    }
    if(empty($login) && empty($password)) {}
    else{
        session_start();
        $_SESSION['login'] = $_POST['login'];
        header('Location: zonePerso.php');
    }
   }
?>