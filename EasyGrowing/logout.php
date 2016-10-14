<?php
/**
 * Created by PhpStorm.
 * User: aquilain
 * Date: 14/10/2016
 * Time: 09:35
 */
session_start();
session_unset();
session_destroy();
header('Location: login.php');
?>