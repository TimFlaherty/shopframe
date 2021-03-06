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

//Stock item from inventory
function stockitem() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("disp").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("POST", "../controllers/stockitem.php", true);
	xmlhttp.send();		
}

//Stock item from inventory
function stockitemUI(id) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("disp").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("POST", "../controllers/stockitemUI.php?itemid="+id, true);
	xmlhttp.send();		
}

//Stock item from inventory
function stockit() {
	itemid = $("#itemid").html();
	storeid = $("#store").val();
	loc = $("#location").val();
	amount = $("#amount").val();
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
			stockUI();
		}
	};
	xmlhttp.open("POST", "../controllers/newstock.php?itemid="+itemid
		+"&storeid="+storeid
		+"&location="+loc
		+"&amount="+amount, true);
	xmlhttp.send();		
}

//Display employee ID and store
function empinfo() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("empinfo").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../views/empinfo.php", true);
	xmlhttp.send();		
}

empinfo();