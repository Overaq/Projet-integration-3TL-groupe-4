<?php
session_start();
include "Constante.php";
$bddP->exec('SET NAMES utf8');
if(isset($_GET['id']) AND $_GET['id']>0) {
    $getid = intval($_GET['id']);
    $req = $bddP->prepare('select * From plantes Where id = ?');
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
                                <div id=\"plante_txt\"><p>description</p></div>
				<div class=\"clear\"></div>
		                <a href=\"#\">lien</a></td>
                    </div>
                </main>
            </body>
        </html>
    ";
?>
