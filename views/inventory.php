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
	alert(id);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("disp").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("POST", "../views/edit.php?id=" + id, true);
	xmlhttp.send();	
}

showhead();
allitems();
</script>
</head>

<body>
<div id="head"></div>
<div id="disp"></div>
</body>
</html>
