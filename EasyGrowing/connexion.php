<?php
session_start();
include "Constante.php";
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
        <main>
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
                <p>Pas de compte ?</p>
                <a href="inscription.php">Créer compte</a>
            </div>
        </main>
    </body>
</html>

