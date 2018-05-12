<?php
/*User Registration Function*/
include('../lib/mvc.php');
include(controllers.'handler.php');
include(lib.'cryptr.php');

//Connect to db
$dbconn = new handler();

$uname = $_REQUEST['uname'];
$pass = cryptr('encrypt',$_REQUEST['pswd']);
$email = $_REQUEST['email'];

$dbconn->write("usr", array(NULL, $uname, $pass, 1, $email));

session_start();
$_SESSION['uid'] = $dbconn->id;
$_SESSION['uname'] = $uname;
$_SESSION['access'] = 1;

header('Location: ../views/index.php');
?>