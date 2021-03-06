<?php
//Store class
include_once('../lib/mvc.php');
include_once(controllers.'handler.php');
class store extends handler {
	public function newstore($sname, $addr) {
		$this->write('stores', array(NULL,$sname,$addr['ln1'],$addr['ln2'],$addr['city'],$addr['state'],$addr['zip']));
		$stocktable = $this->conn->prepare('CREATE VIEW store_stock_'.$this->id.' AS SELECT * FROM stock WHERE storeid = '.$this->id);
		$stocktable->execute();
	}
	
	//Return store info for all stores
	public function getstores() {
		return $this->readAll('storeid, storename','stores','storeid','storeid');
	}
}
?>