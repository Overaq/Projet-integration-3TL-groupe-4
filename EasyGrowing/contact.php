<?php
session_start();
include "Constante.php";
if(isset($_POST['mailform']))
{
	if(!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['msg']))
	{
		$headers="From:overaq@vps319254.ovh.net";
		$message='Message de '.$_POST['name'].' contactable à l\'adresse mail suivante: '.$_POST['mail'].' message: '.nl2br($_POST['msg']).' ';
		mail("thomasdepiereux@gmail.com", "Contact EasyGrowing", $message, $headers);
		$alert="Merci pour votre message";
	}
}
?>
<html>
	<head>
		<?php echo $head?>
	</head>
	<body>
		<div class="centre">
		<?php echo $header?>
		<h2>Formulaire de contact</h2>
		<form method="POST" action="">
			<input type="text" name="name" placeholder="Votre nom" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>" required /><br />
			<input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" required /><br />
			<textarea name="msg" placeholder="Votre message" required><?php if(isset($_POST['msg'])) { echo $_POST['msg']; } ?></textarea><br />
			<input type="submit" value="Envoyer !" name="mailform"/>
		</form>
		</div>
		<?php
		if(isset($alert))
		{
			echo $alert;
		}
		?>
		<?php echo $footer?>
	</body>
</html>