<?php
session_start();
include "Constante.php";
echo "
<!Doctype html>
<html>
	".$head."
	<body>
		".$header."
		<main>
			<div class=\"main\" id=\"BDDP\">
				<h1>Base de donnée plantes</h1>
				<h2>Désolé nous n'avons pas accès à la base de donnée</h2>
			</div>
		</main>
	</body>
</html>
"
?>