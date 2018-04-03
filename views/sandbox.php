<?php
session_start(); 
?>
<html>
<head>
<title>Log In</title>
</head>

<body>
<br>
<h2>Please log in to continue:</h2>
<form action="../controllers/logfunc.php" method="POST">
<table>
	<tr>
		<td>Username:</td>
		<td><input type="text" name="uname"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="pswd"></td>
	</tr>
</table>
<input type="submit" value="Log In">
</form>
<h3>Username:Password Combinations for Testing</h3>
<p>admin:cs130b</p>
<p>employee:employed</p>
<p>customer:shopping</p>
<?php
/*
require('handler.php');
require('cryptr.php');
$dbconn = new handler();

$apass = cryptr('encrypt','cs130b');
$epass = cryptr('encrypt','employed');
$cpass = cryptr('encrypt','shopping');

$dbconn->write('usr', array(NULL, 'admin', $apass, 3, NULL));
$dbconn->write('usr', array(NULL, 'employee', $epass, 2, NULL));
$dbconn->write('usr', array(NULL, 'customer', $cpass, 1, NULL));
*/
?>
</body>
</html>
