<?php
require('../lib/mvc.php');
require(controllers.'handler.php');

class product extends handler {
	public $itemid;
	public $itemname;
	public $itemprice;
	public $cat;
	public $subcat;
	public $description;

	public function __construct(){
		parent::__construct();
		session_start();
		if(!isset($_GET['itemid']) && empty($_GET['itemid'])) {
			header('Location: ../views/index.php');
		}else{
			$this->itemid = $_GET['itemid'];
			$item = $this->read('*','inventory','itemid',$this->itemid);
			$this->itemname = $item['itemname'];
			$this->itemprice = $item['itemprice'];
			$this->cat = $item['cat'];
			$this->subcat = $item['subcat'];
			$this->description = $item['description'];			
		}
	}
	
	public function getPix($id) {
		return $this->readAll('filename','img','itemid',$id);
	}
}
?>