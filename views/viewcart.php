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

//AJAX function displays cart
function showcart() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("disp").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controllers/showcart.php", true);
	xmlhttp.send();	
}

function modqntjax(id){
	newqnt = document.getElementById('newqnt'+id).value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			showhead();
			showcart();
		}
	};
	xmlhttp.open("GET", "../controllers/modqnt.php?item="+id+"&qnt="+newqnt, true);
	xmlhttp.send();	
}
	
//AJAX script updates item quantity
function modqnt(item) {
	qnt = document.getElementById('qnt'+item).innerHTML;
	
	document.getElementById('qntcell'+item).innerHTML = 
		'<input type="number" id="newqnt'+item+'">'
		+ '<br><br><button onclick="modqntjax('+item+')">Update</button>';
}

//AJAX function saves cart
function save() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
		}
	};
	xmlhttp.open("GET", "../controllers/savecart.php", true);
	xmlhttp.send();	
}

showhead();
showcart();
</script>
</head>

<body>
<div id="head"></div>
<div id="disp"></div>
</body>
</html>
