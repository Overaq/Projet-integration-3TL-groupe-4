<?php
/**
 * Created by PhpStorm.
 * User: aquilain
 * Date: 13/10/2016
 * Time: 12:48
 */
include "headerFooter.php";
echo"
<!Doctype html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <title>EasyGrowing</title>
        <link href=\"index.css\" rel=\"stylesheet\" type=\"text/css\">
    </head>
    <body>
        ".$header."
    <main>
        <div class=\"main\" id=\"connexion\">
            <h1>Connexion</h1>
            <form method=\"post\" action=\"\">
                <div class=\"form-group\">
                    <label class=\"col-lg-2 control-label\">Login</label>
                    <div class=\"col-lg-10\">
                        <input type=\"text\" class=\"form-control\" name=\"login\" placeholder=\"Login\">
                    </div>
                    <br>
                </div>
                <div class=\"form-group\">
                    <label class=\"col-lg-2 control-label\">Mot de passe</label>
                    <div class=\"col-lg-10\">
                        <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"Mot de passe\">
                    </div>
                    <br>
                </div>
                <center>
                    <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Connexion</button>
                </center>
            </form>
        </div>
    </main>
        ".$footer."
    </body>
</html>
"
?>
