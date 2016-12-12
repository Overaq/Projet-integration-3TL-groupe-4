<?php
include "Constante.php";
if(isset($_POST['forminscription'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255) {
            if($mail == $mail2) {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0) {
                        if($mdp == $mdp2) {
                            $longueurKey=15;
                            $key="";
                            for($i=1;$i<$longueurKey;$i++){
                                $key .= mt_rand(0,9);
                            }
                            $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse,confirmkey) VALUES(?, ?, ?,?)");
                            $insertmbr->execute(array($pseudo, $mail, $mdp ,$key));
                            $Mailheader="MIME-Version: 1.0\r\n";
                            $Mailheader='From:"EasyGrowing.com"<overaq@vps319254.ovh.net>'."\n";
                            $Mailheader.='Content-Type:text/html; charset="uft-8"'."\n";
                            $Mailheader.='Content-Transfer-Encoding: 8bit';

                            $message='
                            <html>
                                <body>
                                    <div align="center">
                                        <a href="http://vps319254.ovh.net/EasyGrowing/confirmation.php?mail='.urldecode($mail).'&key='.$key.'">Confirmer votre compte</a>
                                    </div>
                                 </body>
                            </html>
                            ';

                            mail($mail,"Confirmation du compe",$message,$Mailheader);


                            $erreur = "Votre compte a bien été créé ! <br> Un mail de confirmation a été envoyé à votre adresse mail (il est probable que ce mail arrive dans vos courrier indésirable) <br><a href=\"connexion.php\">Me connecter</a>";
                        } else {
                            $erreur = "Vos mots de passes ne correspondent pas !";
                        }
                    } else {
                        $erreur = "Adresse mail déjà utilisée !";
                    }
                } else {
                    $erreur = "Votre adresse mail n'est pas valide !";
                }
            } else {
                $erreur = "Vos adresses mail ne correspondent pas !";
            }
        } else {
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>
<!DOCTYPE html>
<html>
<?php echo $head?>
<body>
<?php echo $header?>
<main>
    <div class="centre">
        <h2>Inscription</h2>
        <br /><br />
        <form method="POST" action="#" class="centre">
            <table class="centre">
                <tr >
                    <td class="droite">
                        <label for="pseudo">Pseudo : <br> </label>
                    </td>
                    <td>
                        <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="droite">
                        <label for="mail">Mail : <br> </label>
                    </td>
                    <td>
                        <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="droite">
                        <label for="mail2">Confirmation du mail : <br></label>
                    </td>
                    <td>
                        <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="droite">
                        <label for="mdp">Mot de passe : <br></label>
                    </td>
                    <td>
                        <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                    </td>
                </tr>
                <tr>
                    <td class="droite">
                        <label for="mdp2">Confirmation mot de passe : <br></label>
                    </td>
                    <td>
                        <input type="password" placeholder="Confirmez votre mot de passe" id="mdp2" name="mdp2" />
                    </td>
                </tr>
                </table>
		<br>
		<input type="submit" name="forminscription" value="Je m'inscris" />
        </form>
        <?php
        if(isset($erreur)) {
            echo '<color="red">'.$erreur."</font>";
        }
        ?>
    </div>
</main>
<?php echo $footer?>
</body>
</html>
