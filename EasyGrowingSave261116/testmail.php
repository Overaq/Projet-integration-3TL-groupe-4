<?php 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "overaq@vps319254.ovh.net";
    $to = "aquilain.barvaux@hotmail.com";
    $subject = "PHP Mail Test script";
    $message = "This is a test to check the PHP Mail functionality";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "Test email sent";
    /*================================================*/
    $dsn = 'mysql:dbname=EasyGrowing;host=137.74.169.129';
    $user = 'root';
    $password = 'L3ff3L3ff3';
    try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo " et la BDD ca marche";
    } catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
    } 
?>
