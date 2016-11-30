<?php
session_start();
include "Constante.php";
?>
<!DOCTYPE html>
    <html>
        <?php echo $head ?>
        <body>
            <?php echo $header?>
            <main id="NotreProduitM">
                <div class="centre">
                    <h2>Notre Produit </h2>
                    <div id="NotreProduitP">
                        <p>
                            Nous mettons au point une serre de petite taille (40*40*70) entièrement automatisée qui a pour objectif de permettre le développement d'une plante en autonomie.<br>
                            La serre vous permetra de gérez différents facteurs :
                            <ul>
                                <li>La température</li>
                                <li>La luminositée</li>
                                <li>L'humidité du sol</li>
                            </ul>
                            Votre plante pourra donc se développer dans des conditions optimales.<br>
                            Le tout ne demandera aucune compétence particulière en jardinage ou en automation tout ce que vous avez à faire est de télécharger le profil de la plante que vous souhaitez voir grandir.<br>
                            Notre site proposera des profils comprenant des configuration de base pour différentes plantes qui seront modifiable pour répondre à vos attentes personelles.<br>
                        </p>
                    </div>
                    <h4>A l'heure actuelle nous disposons seulement d'un prototype dont voici les images : </h4>
                    <img  class="imgNP" src="img_Produit/notreProduit%20(1).jpg" alt="image du produit">
                    <img  class="imgNP" src="img_Produit/notreProduit%20(2).jpg" alt="image du produit">
                    <img  class="imgNP" src="img_Produit/notreProduit%20(7).jpg" alt="image du produit">
                    <img  class="imgNP" src="img_Produit/notreProduit%20(8).jpg" alt="image du produit">
                    <img  class="imgNP" src="img_Produit/notreProduit%20(6).jpg" alt="image du produit">
                </div>
            </main>
        </body>
    </html>

