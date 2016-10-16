<?php
session_start();
include "Constante.php";
$bdd = new PDO('mysql:host=137.74.169.129;dbname=espace_membre', 'root', 'L3ff3L3ff3');
if(isset($_GET['id']) AND $_GET['id']>0) {
    $getid = intval($_GET['id']);
    $requser= $bdd->prepare('select * From membres Where id = ?');
    $requser->execute(array($getid));
    $userinfo =$requser->fetch();
?>
    <html>
        <?php echo $head ?>
        <body>
            <?php echo $header?>
            <div align="center">
                <h2>Profils de <?php echo $userinfo['pseudo'];?></h2>
                <br>
                Pseudo = <?php echo $userinfo['pseudo'];?>
                <br>
                Mail = <?php echo $userinfo['mail'];?>
                <?php
                if(isset($_SESSION['id']) AND $userinfo['id']== $_SESSION['id'])
                {
                ?>
                <br>
                <p>Ceci est votre Profil</p>
                <a href="deconnexion.php">Se déconnecter</a>
                <?php
                }
                ?>
            </div>
        </body>
    </html>
    <?php
}
?>
