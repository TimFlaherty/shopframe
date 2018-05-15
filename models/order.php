<?php
//Customer order class
include('../lib/mvc.php');
include(controllers.'handler.php');
class order extends handler {
	public $orderid;
	public function neworder() {
		//Construct db connection from parent and start session
		parent::__construct();
		session_start();
		if(isset($_SESSION['uid'])){
			$this->write('orders', array(NULL, $_SESSION['uid'], 1, "PAID"));
		} else {
			$this->write('orders', array(NULL, NULL, 1, "PAID"));
		}
		$this->orderid = $this->id;
		
		//Create new order table and insert cart data
		$create = $this->conn->prepare(
			'DROP TABLE IF EXISTS order'.$this->orderid.'; '
			.'CREATE TABLE order'.$this->orderid
			.'(itemid INT(7) ZEROFILL NOT NULL, itemname VARCHAR(256) NOT NULL, qnt INT(3) NOT NULL, itemprice DECIMAL(6,2) NOT NULL); '
		);
		$create->execute();

		$count = 0;
		foreach($_SESSION['cart'] as $item){
			//This is redundant but otherwise db insert skips first row - PDO or db class issue?
			if($count == 0){$this->write('order'.$this->orderid, array($item["item"],$item["name"],$item["qnt"],$item["price"]));};
			$count++;
			$this->write('order'.$this->orderid, array($item["item"],$item["name"],$item["qnt"],$item["price"]));
		}
	}
	
	public function orderinfo($oid) {
		parent::__construct();
		$info = $this->readAll('*', 'order'.$oid, 'itemid', 'itemid');
		return $info;
	}
}
?>