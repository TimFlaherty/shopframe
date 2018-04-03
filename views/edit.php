<?php
require('../lib/mvc.php');
require(models.'inventoryclass.php');

$id = $_REQUEST['id'];
$inv = new inventory();
$item = $inv->showitem($id);

echo '<table><tr><th>Item ID</th><th>Item Name</th><th>Price</th><th>Category</th><th>Subcategory</th><th>Description</th><th>Edit</th></tr>';
echo '<tr><td>'
	.$item['itemid']
	.'</td><td>'
	.$item['itemname']
	.'</td><td>'
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
echo '</table>';
?>