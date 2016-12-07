<?php
session_start();
include "Constante.php";
$bdd->exec('SET NAMES utf8');
$bouttonPerso="ceci n'est pas votre plante";
if(isset($_GET['id_m_p']) AND $_GET['id_m_p']>0 AND $_GET['id'] AND $_GET['id']>0) {
    $getid = intval($_GET['id_m_p']);
    if(isset($_SESSION['id'])){
        if($_SESSION['id']==$_GET['id']){
            if(isset($_POST['formmpp'])){
                $insertmpp=$bdd->prepare("UPDATE membre_possede_plante SET humidite = ? ,temperature = ? ,heures = ? where id_m_p = ?");
                $insertmpp->execute(array(htmlspecialchars($_POST['humidite']),htmlspecialchars($_POST['nbrdose']),htmlspecialchars($_POST['température']),htmlspecialchars($_POST['humdité-terre']),htmlspecialchars($_POST['heure_exposition']),htmlspecialchars($_POST['cycle']),$getid));
                $bouttonPerso2="<br><p>Modifiée</p><br><input type=\"submit\" name=\"formmpp\" value=\"Enregistre les valeurs\">";
            }
            else{
                $bouttonPerso2="<br><br><input type=\"submit\" name=\"formmpp\" value=\"Enregistre les valeurs\">";
            }
        }
        else{}
    }
    else{}
    $req = $bdd->prepare(
        'Select mpp.id_m_p as id_m_p, p.addresseImg, p.nomPlantes, p.description, mpp.humidite as humidite, mpp.temperature as temperature, mpp.heures as heures
        from membre_possede_plante as mpp INNER JOIN plantes as p on mpp.id_plantes=p.id where mpp.id_membres = ? and mpp.id_m_p = ?'
    );
    $req->execute(array($_GET['id'],$getid));
    $info =$req->fetch();
    $bouttonPerso= "<a href=\"supprimerPlante.php?id=".$info['id_m_p']."\" class=\"supprimerPlante\">supprimer ".$info['nomPlantes']."</a>";
    $bouttonPerso.=$bouttonPerso2;
}
else {header('Location:profil.php');};
echo "
        <!DOCTYPE html>
        <html>
            ".$head."
            <body>
                ".$header."
                <main>
                    <div class=\"main\" id=\"plante\">
                        <h1>".$info['nomPlantes']."</h1>
                                <img class=\"tb_plante_img\" src=\"img_Plantes/".$info['addresseImg']."\" alt = \"".$info['nomPlantes']."\" >
                                <div id=\"plante_txt\">
                                    Description : ".$info['description']."
                                    <br><br>
                                    <p id=\"warning\">!!! Attention la modification des données ci-dessous est à vos risques et périls !!!</p>
                                    <form method=\"POST\" action=\"\">
                                        <label for=\"humidite\">Humidité : </label> <input id=\"humidite\" type=\"number\" name=\"humidite\" step=\"1\" max=\"100\" min=\"0\" size=\"4\" value=".$info['humidite']." > % <br><br>
                                        <label for=\"température\">Température : </label> <input id=\"température\" type=\"number\" name=\"température\" step=\"1\" max=\"100\" min=\"0\" size=\"4\" value=".$info['temperature']."> °C <br><br>
                                        <label for=\"heure_exposition\">Heures d'expositions : </label> <input id=\"heure_exposition\" type=\"time\" name=\"heure_exposition\" value=".$info['heures']."> heure(s) <br><br>
                                        ".$bouttonPerso ."
                                    </form>
                                    
                                </div>
                        <div class=\"clear\"></div>
                    </div>
                </main>
            </body>
        </html>
    ";
?>
