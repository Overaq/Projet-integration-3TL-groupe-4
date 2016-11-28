<?php
session_start();
include "Constante.php";
if(isset($_GET['id']) AND $_GET['id']>0) {
    $getid = intval($_GET['id']);
    $requser= $bdd->prepare('select * From membres Where id = ?');
    $requser->execute(array($getid));
    $userinfo =$requser->fetch();
    ?>
    <!DOCTYPE html>
    <html>
    <?php echo $head ?>
    <body>
    <?php echo $header?>
    <main>
        <div class="centre">
            <h2>Profils de <?php echo $userinfo['pseudo'];?></h2>
            <br>
            Pseudo = <?php echo $userinfo['pseudo'];?>
            <br>
            Mail = <?php echo $userinfo['mail'];?>
            <br><br>Vos plantes :
            <?php
            $requserplante= $bdd->prepare('select nomPlantes, id_m_p From membres INNER JOIN membre_possede_plante as mpp on membres.id=mpp.id_membres INNER JOIN plantes on mpp.id_plantes=plantes.id where membres.id= ?');
            $requserplante->execute(array($getid));
            while($userplante =$requserplante->fetch()){
                echo "<br><a href=\"maPlante.php?id_m_p=".$userplante['id_m_p']."&id=".$_GET['id']."\" class=\"maPlante\">".$userplante['nomPlantes']."</a> [<a href=\"supprimerPlante.php?id=".$userplante['id_m_p']."\" class=\"supprimerPlante\">supprimer ".$userplante['nomPlantes']."</a>]";
            }
            ?>
            <br>
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
    </main>
    </body>
    </html>
    <?php
}
?>
