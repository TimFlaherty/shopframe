<?php
require('../lib/mvc.php');
require(models.'inventoryclass.php');

$inv = new inventory();
$all = $inv->allitems();

echo '<table><tr><th>Item ID</th><th>Item Name</th><th>Price</th><th>Category</th><th>Subcategory</th><th>Description</th><th>Edit</th></tr>';
foreach($all as $item) {
	echo '<tr><td>'
		.$item['itemid']
		.'</td><td><a href="../views/product.php?itemid='
		.$item['itemid'].'">'
		.$item['itemname']
		.'</a></td><td>'
		.$item['itemprice']
		.'</td><td>'
		.$item['cat']
		.'</td><td>'
		.$item['subcat']
		.'</td><td>'
		.$item['description']
		.'</td><td>'
		.'<button value="'.$item['itemid'].'" onclick="edit(this.value)">Edit</button>'
		.'</td></tr>';
}
echo '</table>';
?>