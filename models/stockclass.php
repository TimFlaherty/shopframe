<?php
include('../lib/mvc.php');
include(controllers.'handler.php');
class stock extends handler {
	//Get stock info for a given store
	public function showstock($storeid) {
		$sql = 'SELECT a.itemid, b.itemname, a.storeid, a.location, a.amount, c.storename '
			.'FROM stock a JOIN inventory b ON a.itemid = b.itemid JOIN stores c on a.storeid = c.storeid ';
		if($storeid !== 'all') {
			$sql .= ' AND a.storeid = '.$storeid;
		}
		$sql .= ' ORDER BY a.storeid, a.location, a.itemid';
		$query = $this->conn->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	//Modify stock quantity
	public function modstock($itemid, $storeid, $location, $amount) {
		$this->update('stock', 'amount', $amount, 'storeid', $storeid.' AND location = "'.$location.'" AND itemid = '.$itemid);
	}
}
?>