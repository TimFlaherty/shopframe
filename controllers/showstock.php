<?php
include('../lib/mvc.php');
include(models.'stockclass.php');
$storeid = $_REQUEST['storeid'];
$storestock = new stock();
$stock = $storestock->showstock($storeid);
$counter = 0;
echo '<table><tr><th>Store ID</th><th>Store Name</th><th>Item ID</th><th>Item Name</th><th>Location</th><th>Amount</th></tr>';
foreach($stock as $item) {
	echo '<tr><td id="storeid'.$counter.'">'
		.$item['storeid']
		.'</td><td>'
		.$item['storename']
		.'</td><td id="itemid'.$counter.'">'
		.$item['itemid']
		.'</td><td>'
		.$item['itemname']
		.'</td><td id="loc'.$counter.'">'
		.$item['location']
		.'</td><td id="amount'.$counter.'">'
		.$item['amount']
		.'<br><button value="'.$counter.'" onclick="modstock(this.value, '.$item['amount'].')">Change</button>'
		.'</td></tr>';
		$counter++;
}
echo '</table>'
?>