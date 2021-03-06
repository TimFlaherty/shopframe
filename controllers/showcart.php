<?php
require('../lib/mvc.php');
session_start();
$cart = $_SESSION['cart'];
$total = 0;
echo '<table><tr><th>Item</th><th>Price</th><th>Quantity</th><th>Item Total</th></tr>';
foreach($cart as $item) {
	echo '<tr><td><a href="../views/product.php?itemid='
		.$item['item'].'">'
		.$item['name']
		.'</a></td><td>$'
		.$item['price']
		.'</td><td id="qntcell'.(int)$item['item'].'">'
		.'<a href="#" id="qnt'.(int)$item['item'].'" onclick="modqnt('.(int)$item['item'].');">'
		.$item['qnt']
		.'</a><br><a href="../controllers/remove.php?item='.(int)$item['item'].'"><button class="btn btn-outline-danger">Remove</button></a>'
		.'</td><td>$'
		.number_format(($item['price']*$item['qnt']), 2)
		.'</td></tr>';
	$total += $item['price']*$item['qnt'];
}
echo '<tr><th colspan="3">Order Total: </th><td><b>$'.number_format($total, 2).'</b></td></tr>';
echo '</table>';
echo '<p><button class="btn" onclick="save()">Save Cart</button><a href="../controllers/checkout.php"><button class="btn">Checkout</button></a></p>';
?>