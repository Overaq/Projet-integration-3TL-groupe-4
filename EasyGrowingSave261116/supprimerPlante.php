<?php
session_start();
include "Constante.php";
if(isset($_GET['id'])) {
    $getid = intval($_GET['id']);
    $requser= $bdd->prepare('DELETE FROM membre_possede_plante WHERE id_m_p = ? and id_membres = ?');
    $requser->execute(array($getid,$_SESSION['id']));
    echo "supprimer";
    header('Location:profil.php?id='.$_SESSION['id'].'');
}
else {header('Location:profil.php?id='.$_SESSION['id'].'');};    
?>
