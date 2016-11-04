<?php
session_start();
include "Constante.php";
$bdd->exec('SET NAMES utf8');
if(isset($_GET['id']) AND $_GET['id']>0) {
    $getid = intval($_GET['id']);
    $req = $bdd->prepare('select * From plantes Where id = ?');
    $req->execute(array($getid));
    $info =$req->fetch();
    if (isset($_SESSION['id'])){
        $reqmpp=$bdd->prepare("Select * from membre_possede_plante where id_membres = ? AND id_plantes = ? ");
        $reqmpp->execute(array($_SESSION['id'],$getid));
        $resultmpp=$reqmpp->rowCount();
        if ($resultmpp==1){
            $favorisState="<p>Cette plante est déjà dans vos favoris</p>";
        }
        else {
            if(isset($_POST['formmpp'])){
                $insertmpp=$bdd->prepare("INSERT into membre_possede_plante (id_membres,id_plantes,humidite,doses,temperature,humiditeSol,heures,cycle) values (?,?,?,?,?,?,?,?)");
                $insertmpp->execute(array($_SESSION['id'],$getid,$_POST['humidite'],$_POST['nbrdose'],$_POST['température'],$_POST['humdité-terre'],$_POST['heure_exposition'],$_POST['cycle']));
                $favorisState="<p>Cette plante a été ajoutée à vos favoris</p>";
            }
            else{
                $favorisState="<br><br><input type=\"submit\" name=\"formmpp\" value=\"Ajouter cette plante avec les valeurs indiquées\">";
            }
        }
    }
    else{
        $favorisState="<p>vous ne pouvez pas ajouter de plante sans compte</p>";
    }
}
else {header('Location:BDDP.php');};
echo "
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
                                    <p id=\"warning\">!!! Attention la modification des données ci-dessous est à vos risques et périls !!!</p>
                                    <form method=\"POST\" action=\"\">
                                        <label for=\"humidite\">Humidité : </label> <input id=\"humidite\" type=\"number\" name=\"humidite\" step=\"1\" max=\"100\" min=\"0\" size=\"4\" value=".$info['humidite']." > % <br><br>
                                        <label for=\"nbrdose\">Doses : </label> <input id=\"nbrdose\" type=\"number\" name=\"nbrdose\" step=\"1\" max=\"10\" min=\"0\" size=\"4\" value=".$info['doses']."> pcs <br><br>
                                        <label for=\"température\">Température : </label> <input id=\"température\" type=\"number\" name=\"température\" step=\"1\" max=\"100\" min=\"0\" size=\"4\" value=".$info['temperature']."> °C <br><br>
                                        <label for=\"humidité-terre\">Humidité du sol : </label> <input id=\"humidité-terre\" type=\"number\" name=\"humdité-terre\" step=\"1\" max=\"100\" min=\"0\" size=\"4\" value=".$info['humiditeSol']."> % <br><br>
                                        <label for=\"heure_exposition\">Heures d'expositions : </label> <input id=\"heure_exposition\" type=\"time\" name=\"heure_exposition\" value=".$info['heures']."> heure(s) <br><br>
                                        <label for=\"cycle\">cycle(s) : </label><input id=\"cycle\" type=\"number\" name=\"cycle\" step=\"1\" max=\"5\" min=\"0\" size=\"4\" value=".$info['cycle']."> cycle(s)
                                        ".$favorisState."
                                        <input type=\"reset\" value=\"Reset\"> 
                                    </form>
                                </div>
                        <div class=\"clear\"></div>
                    </div>
                </main>
            </body>
        </html>
    ";
?>
