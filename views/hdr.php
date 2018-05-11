<?php
session_start();
echo '<h1>Cool Store</h1>';
echo '<p><a href="index.php">Home</a></p>';
if(!isset($_SESSION['uid']) && empty($_SESSION['uid'])) {
	echo '<a href="login.php"><button>Log In</button></a>';
} else {
	echo '<p>Hello '.$_SESSION["uname"].'!</p>';
	echo '<a href="../controllers/logout.php"><button>Log Out</button></a>';
}
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
	echo '<p><a href="viewcart.php">Cart ('.count($_SESSION['cart']). ')</a></p>';
	$total = 0;
	foreach($_SESSION['cart'] as $item){
		$total += $item['price']*$item['qnt'];
	}
	echo '<p>Total: $'.number_format($total,2).'</p>';
}
?>