<?php
    if(isset($_GET['mail'], $_GET['key']) AND !empty($_GET['mail']) AND !empty($_GET['key'])) {
        $mail=htmlspecialchars(urldecode($_GET['mail']));
        $key = htmlspecialchars($_GET['key']);
        $requser = $bdd->prepare("SELECT * FROM membre WHERE mail = ? AND confirmkey = ?");
        $requser->execute(array($mail, $key));
        $userexist=$requser->rowCount();

        if($userexist==1){
            $user=$requser->fetch();
            if($user['confirme']==0){
                $updateuser=$bdd->prepare("UPDATE membre SET confirme = 1 WHERE mail = ? AND confirmkey = ?");
                $updateuser->execute(array($mail,$key));
                echo "Votre compte a bien été confirmé";
            }
            else{
                echo "Votre compte est déja confimé";
            }
        }
        else {
            echo "L'utilisateur n'existe pas !";
        }
    }