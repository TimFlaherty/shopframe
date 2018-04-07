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
<link rel="stylesheet" type="text/css" href="css/shop.css">
<script src="../controllers/adminAJAX.js"></script>
</head>
<body>
<h1>Admin Page</h1>
<a href="../controllers/logout.php"><button>Log Out</button></a>
<p><button onclick="onlineVis()">Online Visibility Settings</button></p>
<p><button onclick="inv()">Inventory Management</button></p>
<div id="disp"></div>
</body>
</html>