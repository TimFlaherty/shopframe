<?php
session_start(); 
?>
<html>
<head>
<title>Log In</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../views/css/shop.css">
</head>

<body>
<div class="container">
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<a class="navbar-brand" href="index.php">Cool Store</a>
</nav>
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
<input type="submit" class="btn" value="Log In">
</form>
<a href="register.php"><input type="button" class="btn" value="Register"></a>
<h3>Username:Password Combinations for Testing</h3>
<p>admin:cs130b</p>
<p>employee:employed</p>
<p>customer:shopping</p>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
