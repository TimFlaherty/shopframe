<?php
require('../lib/mvc.php');
require(models.'onlineVisibility.php');
function viscontrol() {
	$control = new onlineVisibility();
		
	//Display online inventory parameters
	echo '<h2>Online Store Visibility</h2>';
	$onlineParams = $control->showOnlineParams();
	$savedParams = $control->loadOnlineParams();
	
	echo '<form method="POST" action="../controllers/updateOnlineParams.php">';
	
	if(!empty($onlineParams[stores])) {
		echo '<h3>Stores</h3>';
		foreach($onlineParams[stores] as $store) {
			$storename = $store[storename];
			echo '<p><input type="checkbox" name="store[]" value="'.$storename.'" ';
			foreach($savedParams as $param){
				if($param[param] == 'store' && $param[setting] == $storename) {
					echo ' checked ';
				}
			}
			echo '>'.$store[storename].'</p>';
		}
	}
	
	if(!empty($onlineParams[locations])) {
		echo '<h3>Locations</h3>';
		foreach($onlineParams[locations] as $location) {
			$locname = $location[location];
			echo '<p><input type="checkbox" name="location[]" value="'.$locname.'" ';
			foreach($savedParams as $param){
				if($param[param] == 'location' && $param[setting] == $locname) {
					echo ' checked ';
				}
			}
			echo '>'.$location[location].'</p>';
		}
	}
	
	if(!empty($onlineParams[cats])) {
		//echo '<script>function showSubcats(subcat){alert(subcat);}</script>';
		echo '<h3>Categories</h3>';
		foreach($onlineParams[cats] as $cat) {
			$catname = $cat[cat];
			echo '<p><input type="checkbox" name="cat[]" value="'.$catname.'" onchange="if(this.checked==true){showSubcats(this.value)};" ';
			foreach($savedParams as $param){
				if($param[param] == 'cat' && $param[setting] == $catname) {
					echo ' checked ';
				}
			}
			echo '>'.$cat[cat].'</p>';
		}
	}
	
	if(!empty($onlineParams[subcats])) {
		echo '<h3>Subcategories</h3>';
		foreach($onlineParams[subcats] as $subcat) {
			$subcatname = $subcat[subcat];
			echo '<p><input type="checkbox" name="subcat[]" value="'.$subcatname.'" ';
			foreach($savedParams as $param){
				if($param[param] == 'subcat' && $param[setting] == $subcatname) {
					echo ' checked ';
				}
			}
			echo '>'.$subcat[subcat].'</p>';
		}
	}
	
	echo '<p><input type="submit" value="Update Visibility"></input></p></form>';
}
viscontrol();
?>