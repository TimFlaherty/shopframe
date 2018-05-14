<?php
function showcats() {
	$conn = new handler();
	$cats = $conn->readAll('distinct cat','online_stock','cat','cat');
	echo '<h3>Categories</h3>';
	foreach($cats as $cat){
		$cat = (string)$cat['cat'];
		echo '<button class="btn" id="'.$cat.'" value="'.$cat.'" onclick="display(this.value);">'.$cat.'</button>';
	}
}
?>