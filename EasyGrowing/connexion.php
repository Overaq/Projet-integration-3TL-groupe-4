<?php
session_start();
include "Constante.php";
$bdd = new PDO('mysql:host=137.74.169.129;dbname=espace_membre', 'root', 'L3ff3L3ff3');
if(isset($_POST['formconnect']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($mailconnect) AND !empty($mdpconnect)) {
        $requsr = $bdd -> prepare("Select * From membres WHERE mail = ? AND motdepasse = ?");
        $requsr -> execute(array($mailconnect, $mdpconnect));
        $userexist =$requsr-> rowCount();
        if($userexist==1){
            $userinfo=$requsr->fetch();
            $_SESSION['id']=$userinfo['id'];
            $_SESSION['pseudo']=$userinfo['pseudo'];
            $_SESSION['mail']=$userinfo['mail'];
            header("Location:profil.php?id=".$_SESSION['id']);
        }
        else{
            $erreur="Mauvais Identifiants";
        }
    }
    else{
        $erreur="Tous les champs doivent être remplis !";
    }
}
?>
<html>
<?php echo $head?>
<body>
<?php echo $header?>
<div align="center">
    <h2>Connexion</h2>
    <br /><br />
    <form method="POST" action="">
        <input type="email" name="mailconnect" placeholder="Mail">
        <input type="password" name="mdpconnect" placeholder="Mot de passe">
        <input type="submit" name="formconnect" value="Se Connecter">
    </form>
    <?php
    if(isset($erreur)) {
        echo '<color="red">'.$erreur."</font>";
    }
    ?>
    <p>Pas de compte ?</p><br>
    <a href="inscription.php">Créé compte</a>
</div>
</body>
</html>

