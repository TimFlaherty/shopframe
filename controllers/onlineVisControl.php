<?php
require('../lib/mvc.php');
require(controllers.'handler.php');
//Administrative control class
class onlineVisControl extends handler {
	//Fetches online store display parameters
	public function showOnlineParams() {
		$stores = $this->readAll('DISTINCT storename','stores','storename','storename');
		$locations = $this->readAll('DISTINCT location','stock','location','location');
		$cats = $this->readAll('DISTINCT cat','inventory','cat','cat');
		$subcats = $this->readAll('DISTINCT subcat','inventory','subcat','subcat');
		return array(stores=>$stores, locations=>$locations, cats=>$cats, subcats=>$subcats);
	}

	protected function saveParams(){}

	//Updates online store visibility by altering "online_store" db view
	public function updateOnlineParams($params) {
		//Build (complicated) SQL statement to update online inventory view
		$sql = 'ALTER VIEW online_stock AS SELECT b.*, '
		.'SUM(a.amount) AS "amount" FROM stock a '
		.'JOIN inventory b  ON a.itemid = b.itemid ';
		$sqlvars = '';
		$savedata = array();
		foreach($params as $param=>$values) {
			//Checks for store parameter and incorporates in to query
			if($param == 'store'){
				$sqlvars .= 'JOIN stores c ON a.storeid = c.storeid AND c.storename IN(';
				foreach($params[store] as $store) {
					$sqlvars .= '"'.$store.'",';
				}
				$sqlvars = rtrim($sqlvars, ', ');
				$sqlvars .= ') ';
			}
			//Checks for in-store location parameter and incorporates in to query
			if($param == 'location'){
				$sqlvars .= 'AND a.location IN(';
				foreach($params[location] as $location) {
					$sqlvars .= '"'.$location.'",';
				}
				$sqlvars = rtrim($sqlvars, ', ');
				$sqlvars .= ') ';
			}
			//Checks for category parameter and incorporates in to query
			if($param == 'cat'){
				$sqlvars .= 'AND b.cat IN(';
				foreach($params[cat] as $cat) {
					$sqlvars .= '"'.$cat.'",';
				}
				$sqlvars = rtrim($sqlvars, ', ');
				$sqlvars .= ') ';
			}
			//Checks for subcategory parameter and incorporates in to query
			if($param == 'subcat'){
				$sqlvars .= 'AND b.subcat IN(';
				foreach($params[subcat] as $subcat) {
					$sqlvars .= '"'.$subcat.'",';
				}
				$sqlvars = rtrim($sqlvars, ', ');
				$sqlvars .= ') ';
			}
			
			//Populate array to save settings
			foreach($values as $value) {
				array_push($savedata, array($param,$value));
			}
		}
		$sqlvars .= ' GROUP BY a.itemid';
		$sql .= $sqlvars;
		
		//Execute query and redirect back to admin page
		$query = $this->conn->prepare($sql);
		$query->execute();
		header('Location: ../views/adminview.php');
	}
}
?>