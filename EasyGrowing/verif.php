<?php
/**
 * Created by PhpStorm.
 * User: aquilain
 * Date: 14/10/2016
 * Time: 09:33
 */
/*
si la variable de session login n'existe pas cela siginifie que le visiteur
n'a pas de session ouverte, il n'est donc pas logué ni autorisé à
acceder à l'espace membres
<meta http-equiv="refresh" content="0; URL=index.php">
*/
if(!isset($_SESSION['login'])) {
    echo '<h1>Vous n\'êtes pas connecté, accés interdit !</h1> 
     ';
}
?>