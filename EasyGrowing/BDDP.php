<?php
/**
 * Created by PhpStorm.
 * User: aquilain
 * Date: 13/10/2016
 * Time: 12:44
 */
include "headerFooter.php";
echo "
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
			<div class=\"main\" id=\"BDDP\">
				<h1>Base de donnée plantes</h1>
				<h2>Désolé nous n'avons pas accès à la base de donnée</h2>
			</div>
		</main>
		".$footer."
	</body>
</html>
"
?>