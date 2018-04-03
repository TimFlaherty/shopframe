<?php
/*Login Function*/
require('../lib/mvc.php');
require(controllers.'handler.php');
require(lib.'cryptr.php');
require(models.'user.php');
session_start();

//Connect to db
$dbconn = new handler();

//Grab username and password from post and query db
$uname = '"'.$_POST['uname'].'"';
$pass = cryptr('encrypt',$_POST['pswd']);
$result = $dbconn->read('pwd, access, uid','usr','uname',$uname);

//Check password match and serve appropriate file
if($result['pwd'] == $pass) {
	//Create new user with ID from login
	$usr = new user($result['uid']);
	//Store access level in session
	$usr->usesh();
	$route = $_SESSION['access'];
	if($route == 3){
		header('Location: ../views/adminview.php');
	}else if($route == 2){
		header('Location: ../views/employeeview.php');
	}else if($route == 1){
		header('Location: ../views/customerview.php');
	};
} else {
	echo 'Incorrect Password';
}
?>
