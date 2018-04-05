<?php
echo '<table><tr><th>Item Name</th><th>Price</th><th>Category</th><th>Subcategory</th><th>Description</th></tr>'
	.'<tr><td>'
	.'<input type="text" id="newitemname">'
	.'</td><td>'
	.'<input type="text" id="newitemprice">'
	.'</td><td>'
	.'<input type="text" id="newcat">'
	.'</td><td>'
	.'<input type="text" id="newsubcat">'
	.'</td><td>'
	.'<input type="text" id="newdescription">'
	.'</td></tr></table>'
	.'<button onclick="newitem()">Add Item</button>';
?>