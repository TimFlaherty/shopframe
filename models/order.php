<?php
//Customer order class
require('../lib/mvc.php');
require(controllers.'handler.php');
class order extends handler {
	public $contents = array();	
	
	public function __construct() {
		//Construct db connection from parent and start session
		parent::__construct();
		session_start();
		if(isset($_SESSION['uid'])){
			$this->write('orders', array(NULL, $_SESSION['uid'], 1, "PAID"));
		} else {
			$this->write('orders', array(NULL, NULL, 1, "PAID"));
		}
		$orderid = $this->id;
		
		//Create new order table and insert cart data
		$create = $this->conn->prepare(
			'DROP TABLE IF EXISTS order'.$orderid.'; '
			.'CREATE TABLE order'.$orderid
			.'(itemid INT(7) ZEROFILL NOT NULL, itemname VARCHAR(256) NOT NULL, qnt INT(3) NOT NULL, itemprice DECIMAL(6,2) NOT NULL); '
		);
		$create->execute();
		
		foreach($_SESSION['cart'] as $item){
			$this->write('order'.$orderid, array($item["item"],$item["name"],$item["qnt"],$item["price"]));
			return TRUE;
		}
	}
}
?>