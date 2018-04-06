<?php
session_start();
$access = (int)$_SESSION['access'];
if($access < 2) {
	header('Location: 403.php');
} else {
	echo '<h1>This is the employee page</h1>'
		.'<p>Your access level is: '.$_SESSION['access'].'</p>'
		.'<p><a href="index.php">Web Store</a></p>'
		.'<p><button onclick="checkout()">Checkout Customer</button></p>'
		.'<p><button onclick="managestock()">Manage Stock</button></p>';
}
?>