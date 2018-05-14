<?php
require('../lib/mvc.php');
require(controllers.'handler.php');
$conn = new handler();
$cat = $_REQUEST["cat"];
$result = $conn->readAll('*','online_stock','cat','"'.$cat.'"');
foreach($result as $item) {
	echo '<div id="'.$item['itemid'].'" class="item">';
	echo '<a href="../views/product.php?itemid='.$item['itemid'].'"><h4 id="name'.$item['itemid'].'">'.$item['itemname'].'</h4></a>';
	echo '<p id="price'.$item['itemid'].'" value="'.$item['itemprice'].'">$'.$item['itemprice'].'</p>';
	echo '<p>'.$item['description'].'</p>';
	echo '<p>Quantity: <input id="qnt'.$item['itemid'].'" type="number" name="qnt" min="1" max="10" value="1"></p>';
	echo '<button class="btn" value="'.$item['itemid'].'" onclick="add(this.value)">Add to cart</button>';
	echo '</div>';
}
?>