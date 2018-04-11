<?php
//Inventory class
include('../lib/mvc.php');
include(controllers.'handler.php');

class inventory extends handler {
	//Return inventory data
	public function allitems() {
		$all = $this->readAll('*','inventory','itemid','itemid');
		return $all;
	}
	
	//Add item
	public function additem($name, $price, $cat, $subcat, $description) {
		$this->write('inventory', array(NULL, $name, $price, $cat, $subcat, $description));
		return $this->id;
	}
	
	//Return item for editing
	public function showitem($id) {
		$item = $this->read('*','inventory','itemid',$id);
		return $item;
	}
	
	//Modify items
	public function moditem($target, $value, $id) {
		$this->update('inventory', $target, $value, 'itemid', $id);
	}
	
	//Delete items
	public function deleteitem($id) {
		$this->delete('inventory','itemid',$id);
	}
}
?>