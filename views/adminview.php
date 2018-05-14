<?php
require('../lib/mvc.php');
session_start();
$access = (int)$_SESSION['access'];
if($access < 3) {
	header('Location: 403.php');
}
?>
<html>
<head>
<title>Admin Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/shop.css">
<script src="../controllers/adminAJAX.js"></script>
</head>

<body>
<div class="container">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="index.php">Cool Store</a>
		<span class="container-fluid justify-content-end">
			<a href="../controllers/logout.php"><button class="btn">Log Out</button></a>
		</span>
	</nav>
	<h1>Admin Page</h1>
	<p><button class="btn" onclick="onlineVis()">Online Visibility Settings</button></p>
	<p><button class="btn" onclick="inv()">Inventory Management</button></p>
	<div id="disp"></div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>