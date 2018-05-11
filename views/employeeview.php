<?php
require('../lib/mvc.php');
session_start();
$access = (int)$_SESSION['access'];
if($access < 2) {
	header('Location: 403.php');
}
?>
<html>
<head>
<title>Employee Page</title>
<link rel="stylesheet" type="text/css" href="css/shop.css">
<script src="../controllers/empAJAX.js"></script>
</head>
<body>
<h1>Employee Page</h1>
<a href="../controllers/logout.php"><button>Log Out</button></a>
<!-- <p><button onclick="checkout()">Checkout</button></p> -->
<p><button onclick="stockUI()">Manage Stock</button></p>
<div id="empinfo"></div>
<div id="disp"></div>
</body>
</html>