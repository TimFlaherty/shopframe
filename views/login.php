<?php
session_start(); 
?>
<html>
<head>
<title>Log In</title>
</head>

<body>
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
<a href="register.php"><input type="button" value="Register"></a>
<h3>Username:Password Combinations for Testing</h3>
<p>admin:cs130b</p>
<p>employee:employed</p>
<p>customer:shopping</p>
<a href="index.php"><input type="button" value="Home"></a> 
</body>
</html>
