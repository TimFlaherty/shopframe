<html>
<head>
<title>Cool Store - Cart</title>
<link rel="stylesheet" type="text/css" href="css/shop.css">
<script>
//AJAX function displays page header
function showhead() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("head").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../views/hdr.php", true);
	xmlhttp.send();	
}

//Displays inventory
function allitems() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("disp").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controllers/allitems.php", true);
	xmlhttp.send();	
}

//Displays inventory
function edit(id) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("disp").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("POST", "../views/edit.php?id=" + id, true);
	xmlhttp.send();	
}

//Displays inventory
function mod(field, orig) {
	document.getElementById(field).innerHTML = 
		'<input type="text" id="new'+field+'" value="'+orig+'">'
		+'<button value="'+field+'" onclick="update(this.value)">Update</button>';
}

//Displays inventory
function update(target) {
	newval = document.getElementById("new"+target).value;
	id = document.getElementById("itemid").innerHTML;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			edit(id);
		}
	};
	xmlhttp.open("POST", "../controllers/moditem.php?id="+id+"&target="+target+"&newval="+newval, true);
	xmlhttp.send();	
}

showhead();
allitems();
</script>
</head>

<body>
<div id="head"></div>
<p><button onclick="allitems()">Show All Items</button></p>
<div id="disp"></div>
</body>
</html>
