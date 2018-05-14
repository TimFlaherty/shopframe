<?php
session_start();
echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">';
echo '<a class="navbar-brand" href="index.php">Cool Store</a>';
echo '<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">'
	.'<span class="navbar-toggler-icon"></span>'
	.'</button>'
	.'<div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">'
	.'<ul class="navbar-nav mr-4">';
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
	echo '<li class="nav-item"><a class="nav-link" href="viewcart.php">Cart ('.count($_SESSION['cart']). ')</a></li>';
	$total = 0;
	foreach($_SESSION['cart'] as $item){
		$total += $item['price']*$item['qnt'];
	}
	echo '<li class="nav-item navbar-text">$'.number_format($total,2).'</li></ul>';
}
if(!isset($_SESSION['uid']) && empty($_SESSION['uid'])) {
	echo '<a class="nav-link" href="login.php"><button class="btn">Log In</button></a>';
} else {
	echo '<p class="navbar-text">Hello '.$_SESSION["uname"].'!</p>';
	echo '<a class="nav-link" href="../controllers/logout.php"><button class="btn">Log Out</button></a>';
}
echo '</div></nav>';
?>