//AJAX function displays online visibility options
function onlineVis() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("disp").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../views/onlineVis.php", true);
	xmlhttp.send();	
}

//AJAX function displays inventory management UI
function inv() {
	document.getElementById("disp").innerHTML = 
		'<p><button onclick="allitems()">Show All Items</button></p>'
		+'<p><button onclick="newitemUI()">Add New Item</button></p>'
		+'<div id="inv"></div>';
}

/*** INVENTORY MANAGEMENT FUNCTIONS ***/
//Displays inventory
function allitems() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("inv").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controllers/allitems.php", true);
	xmlhttp.send();	
}

//Displays item editing interface
function edit(id) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("inv").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("POST", "../views/edit.php?id=" + id, true);
	xmlhttp.send();	
}

//Displays input field for item editing
function mod(field, orig) {
	document.getElementById(field).innerHTML = 
		'<input type="text" id="new'+field+'" value="'+orig+'">'
		+'<button value="'+field+'" onclick="update(this.value)">Update</button>';
}

//Updates inventory item info
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

//Displays new item interface
function newitemUI() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("inv").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../views/newitemUI.php", true);
	xmlhttp.send();	
}

//Adds new item to database
function newitem() {
	name = document.getElementById("newitemname").value;
	price = document.getElementById("newitemprice").value;
	cat = document.getElementById("newcat").value;
	subcat = document.getElementById("newsubcat").value;
	desc = document.getElementById("newdescription").value;
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			edit(this.responseText);
		}
	};
	xmlhttp.open("POST", "../controllers/newitem.php?name="+name
		+"&price="+price
		+"&cat="+cat
		+"&subcat="+subcat
		+"&desc="+desc, true);
	xmlhttp.send();	
}

/*
function refreshVis() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
		}
	};
	xmlhttp.open("POST", "../controllers/refreshVis.php", true);
	xmlhttp.send();	
}
*/

//Removes inventory item
function deleteitem(id) {
	if (confirm("Delete item? This cannot be undone.")) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				allitems();
			}
		};
		xmlhttp.open("POST", "../controllers/deleteitem.php?id=" + id, true);
		xmlhttp.send();	
	}
}