<?php
include('../lib/mvc.php');
include(models.'inventoryclass.php');
include(models.'store.php');

$itemid = $_REQUEST['itemid'];

$inv = new inventory;
$item = $inv->showitem($itemid);

echo '<br><table><tr><th>Item ID</th><th>Item Name</th><th>Price</th><th>Category</th><th>Subcategory</th><th>Description</th></tr>';
echo '<tr><td id="itemid">'
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
	.'</td></tr>';
echo '</table><br>';

echo '<p>Select store: ';
$storeinfo = new store;
$stores = $storeinfo->getstores();
echo '<select id="store">';
foreach($stores as $store){
	echo '<option value="'.$store['storeid'].'">'.$store['storename'].'</option>';
}
echo '</select></p>';

echo '<p>Select item location: '
	.'<select id="location">'
	.'<option value="FLOOR">FLOOR</option>'
	.'<option value="BACK">BACK</option>'
	.'</select>'
	.'</p>';

echo '<p>Enter quantity: <input id="amount" type="number" min="0"></input></p>';

echo '<p><button class="btn" onclick="stockit()">Stock Item</button></p>';
?>