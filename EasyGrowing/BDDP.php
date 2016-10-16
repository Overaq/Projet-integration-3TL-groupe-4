<?php
session_start();
include "Constante.php";
$reqPlantes = $bddP->prepare("SELECT * FROM Plantes ");
$reqPlantes->execute();
$plantesinfo =$reqPlantes->fetch();
echo "
<!Doctype html>
<html>
	".$head."
	<body>
		".$header."
		<main>
			<div class=\"main\" id=\"BDDP\">
				<h1>Base de donnée plantes</h1>
				".$plantesinfo['nomPlantes']."
			</div>
		</main>
	</body>
</html>
"
?>