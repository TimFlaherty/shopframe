<?php
//Store class
require('../lib/mvc.php');
require(controllers.'handler.php');
class store extends handler {
	public function newstore($sname, $addr) {
		$this->write('stores', array(NULL,$sname,$addr['ln1'],$addr['ln2'],$addr['city'],$addr['state'],$addr['zip']));
		$stocktable = $this->conn->prepare('CREATE VIEW store_stock_'.$this->id.' AS SELECT * FROM stock WHERE storeid = '.$this->id);
		$stocktable->execute();
	}
}
?>