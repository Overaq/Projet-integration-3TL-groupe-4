<?php
session_start();
include "Constante.php";
$bdd->exec('SET NAMES utf8');
if(isset($_GET['id_m_p']) AND $_GET['id_m_p']>0) {
    $getid = intval($_GET['id_m_p']);
    $req = $bdd->prepare(
        'Select addresseImg, nomPlantes, description, mpp.humidite as humidite, mpp.doses as doses, mpp.temperature as temperature, mpp.humiditeSol as humiditeSol, mpp.heures as heures, mpp.cycle as cycle 
        from membre_possede_plante as mpp INNER JOIN plantes as p on mpp.id_plantes=p.id where mpp.id_membres = ? and mpp.id_m_p = ?'
    );
    $req->execute(array($_SESSION['id'],$getid));
    $info =$req->fetch(); 
}
else {header('Location:profil.php');};
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
                                    </form>
                                </div>
                        <div class=\"clear\"></div>
                    </div>
                </main>
            </body>
        </html>
    ";
?>
