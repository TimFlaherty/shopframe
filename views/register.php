<html>
<head>
<title>Log In</title>
</head>

<body>
<h2>Enter your preferred user name and password:</h2>
<form action="../controllers/newuser.php" method="POST">
<table>
	<tr>
		<td>Username:</td>
		<td><input type="text" name="uname"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="pswd"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="email" name="email"></td>
	</tr>
</table>
<input type="submit" value="Register">
</form>