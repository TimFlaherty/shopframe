<?php
require('../lib/mvc.php');
require(models.'inventoryclass.php');

$id = $_REQUEST['id'];
$inv = new inventory();
$item = $inv->showitem($id);

echo '<table><tr><th>Item ID</th><th>Item Name</th><th>Price</th><th>Category</th><th>Subcategory</th><th>Description</th></tr>';
echo '<tr><td id="itemid">'
	.$item['itemid']
	.'</td><td id="itemname">'
	.$item['itemname']
	.'<button value="itemname" onclick="mod(this.value, &quot;'.$item['itemname'].'&quot;)">Change</button>'
	.'</td><td id="itemprice">'
	.$item['itemprice']
	.'<button value="itemprice" onclick="mod(this.value, &quot;'.$item['itemprice'].'&quot;)">Change</button>'
	.'</td><td id="cat">'
	.$item['cat']
	.'<button value="cat" onclick="mod(this.value, &quot;'.$item['cat'].'&quot;)">Change</button>'
	.'</td><td id="subcat">'
	.$item['subcat']
	.'<button value="subcat" onclick="mod(this.value, &quot;'.$item['subcat'].'&quot;)">Change</button>'
	.'</td><td id="description">'
	.$item['description']
	.'<button value="description" onclick="mod(this.value, &quot;'.$item['description'].'&quot;)">Change</button>'
	.'</td></tr>';
echo '</table>';
?>