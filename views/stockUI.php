<?php
include('../lib/mvc.php');
include(models.'store.php');
$store = new store();
$stores = $store->getstores();
echo '<button value="all" onclick="showstock(this.value)">All Stock</button>';
foreach($stores as $row) {
	echo '<button onclick="showstock('.$row[storeid].')">'.$row[storename].' Stock</button>';
}
echo '<div id="stock"></div>';
?>