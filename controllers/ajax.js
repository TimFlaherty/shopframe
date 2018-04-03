//AJAX function accepts category and returns all items from same
function display(cat) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("disp").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controllers/display.php?cat=" + cat, true);
	xmlhttp.send();	
}

//AJAX function adds item to cart
function add(item) {
	var qnt = document.getElementById("qnt"+item).value;
	var name = encodeURI(document.getElementById("name"+item).innerHTML);
	var price = document.getElementById("price"+item).innerHTML;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
			showhead();
		}
	};
	xmlhttp.open("GET", "../controllers/add.php?item="+item+"&name="+name+"&qnt="+qnt+"&price="+price, true);
	xmlhttp.send();	
}

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

showhead();
