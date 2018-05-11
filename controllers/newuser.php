<?php
/*User Registration Function*/
require('../lib/mvc.php');
require(controllers.'handler.php');
require(lib.'cryptr.php');

//Connect to db
$dbconn = new handler();

$uname = $_POST['uname'];
$pass = cryptr('encrypt',$_POST['pswd']);
$email = $_POST['email'];

$dbconn->write("usr", array(NULL, $uname, $pass, 1, $email));

header('Location: ../views/login.php');
?>