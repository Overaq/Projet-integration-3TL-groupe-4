<?php
if(isset($_POST['mailform']))
{
	if(!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['msg']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';
		$message='
		<html>
			<body>
					<h3>Nom:</h3>'.$_POST['name'].'<br />
					<h3>Mail:</h3>'.$_POST['mail'].'<br />
					'.nl2br($_POST['msg']).'
			</body>
		</html>
		';
		mail("thomasdepiereux@gmail.com", "Contact EasyGrowing", $message, $header);
		$alert="Merci pour votre message";
	}
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contactez-nous !</title>
	</head>
	<body>
		<h2>Formulaire de contact</h2>
		<form method="POST" action="">
			<input type="text" name="name" placeholder="Votre nom" value="<?php if(isset($_POST['name'])) { echo $_POST['nom']; } ?>" required /><br />
			<input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" required /><br />
			<textarea name="message" placeholder="Votre message" required><?php if(isset($_POST['message'])) { echo $_POST['msg']; } ?></textarea><br />
			<input type="submit" value="Envoyer !" name="mailform"/>
		</form>
		<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>
	</body>
</html>