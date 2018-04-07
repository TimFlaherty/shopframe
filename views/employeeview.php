<?php
require('../lib/mvc.php');
session_start();
$access = (int)$_SESSION['access'];
if($access < 2) {
	header('Location: 403.php');
}
?>
<html>
<head>
<title>Employee Page</title>
<link rel="stylesheet" type="text/css" href="css/shop.css">
<script src="../controllers/employeeAJAX.js"></script>
<script>
//Display stock UI
function stockUI() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("disp").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../views/stockUI.php", true);
	xmlhttp.send();		
}

//Show selected stock
function showstock(storeid) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("stock").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("POST", "../controllers/showstock.php?storeid="+storeid, true);
	xmlhttp.send();		
}

//Displays input field for item editing
function modstock(row, orig) {
	document.getElementById('amount'+row).innerHTML = 
		'<input type="text" id="new'+row+'" value="'+orig+'">'
		+'<button value="'+row+'" onclick="updatestock(this.value)">Update</button>';
}

//Update stock amount
function updatestock(row) {
	itemid = document.getElementById("itemid"+row).innerHTML;
	storeid = document.getElementById("storeid"+row).innerHTML;
	loc = document.getElementById("loc"+row).innerHTML;
	amount = document.getElementById("new"+row).value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('amount'+row).innerHTML = 
				amount+'<br><button value="'+row+'" onclick="modstock(this.value, '+amount+')">Change</button>';
		}
	};
	xmlhttp.open("POST", "../controllers/updatestock.php?itemid="+itemid
		+"&storeid="+storeid
		+"&location="+loc
		+"&amount="+amount, true);
	xmlhttp.send();	
}
</script>
</head>
<body>
<h1>Employee Page</h1>
<a href="../controllers/logout.php"><button>Log Out</button></a>
<p><button onclick="checkout()">Checkout</button></p>
<p><button onclick="stockUI()">Manage Stock</button></p>
<div id="disp"></div>
</body>
</html>