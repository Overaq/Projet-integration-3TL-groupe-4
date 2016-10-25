<?php
session_start();
include "Constante.php";
$bdd->exec('SET NAMES utf8');
if(isset($_GET['id']) AND $_GET['id']>0) {
    $getid = intval($_GET['id']);
    $req = $bdd->prepare('select * From plantes Where id = ?');
    $req->execute(array($getid));
    $info =$req->fetch();
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
                                    <form method=\"POST\" action=\"\">
                                        Humidité : <input type=\"number\" name=\"humidite\" step=\"1\" max=\"100\" min=\"0\" size=\"4\" value=".$info['humidite']." > % <br><br>
                                        Doses : <input type=\"number\" name=\"nbrdose\" step=\"1\" max=\"10\" min=\"0\" size=\"4\" value=".$info['doses']."> pcs <br><br>
                                        Température : <input type=\"number\" name=\"température\" step=\"1\" max=\"100\" min=\"0\" size=\"4\" value=".$info['temperature']."> °C <br><br>
                                        Humidité du sol : <input type=\"number\" name=\"humdité-terre\" step=\"1\" max=\"100\" min=\"0\" size=\"4\" value=".$info['humiditeSol']."> % <br><br>
                                        Heures d'expositions : <input type=\"time\" name=\"heure_exposition\" value=".$info['heures']."> heure(s) <br><br>
                                        cycle(s) : <input type=\"number\" name=\"cycle\" step=\"1\" max=\"5\" min=\"0\" size=\"4\" value=".$info['cycle']."> cycle(s)
                                    </form>
                                </div>
                        <div class=\"clear\"></div>
                    </div>
                </main>
            </body>
        </html>
    ";
?>
