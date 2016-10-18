<?php
session_start();
include "Constante.php";
if (isset($_Get['id']) and $_GET['id']>0){
    $getid=intval($_GET['id']);
    $reqplante=$bddp->prepare('select*from plantes where id=?');
    $reqplante->execute(array($getid));
    $tableau="";
    while($plantesinfo =$reqPlantes->fetch()){
        $tableau.="    <tr>
                    <td><img class=\"tb_BDDP_img\" src=\"img_Plantes/".$plantesinfo['addresseImg']."\" alt=\"".$plantesinfo['nomPlantes']."\"></td>
                    <td>".$plantesinfo['nomPlantes']."</td>
                    <td>description</td>
		    <td><a href=\"#\">lien</a></td>
                   </tr>";
    }
    echo "
    <!Doctype html>
        <html>
            ".$head."
            <body>
                ".$header."
                <main>
                    <div class=\"main\" id=\"BDDP\">
                        <h1>".$plantesinfo['nomPlantes']."</h1>
                        <Table id='tb_BDDP'>
                            <tr>
                                <th class='td_BDDP'>Photo</th>
                                <th class='td_BDDP'>Nom de la plante</th>
                                <th class='td_BDDP'>Descriptions</th>
                                <th class='td_BDDP'><a href='#'>Téléchargements</a></th>
                            </tr>
                            ".$tableau."
                        </Ttable>
                    </div>
                </main>
            </body>
        </html>
    ";
}
else {header('Location:BDDP.php');}