<?php
if (isset($_GET['source'])) {
	highlight_file($_SERVER['SCRIPT_FILENAME']);
	exit;
}
  
//Shopping cart class
require('../lib/mvc.php');
require(controllers.'handler.php');
class cart extends handler {
	//Constructor checks for and creates new cart array in session 
	public function __construct() {
		session_start();
		if(!isset($_SESSION['cart']) && empty($_SESSION['cart'])) {
			$_SESSION['cart'] = array();
		}
		return TRUE;
	}
	
	//Adds item to cart
	public function add($item, $name, $qnt, $price) {
		//Check if item already in cart and increase quantity if true
		$found = FALSE;
		foreach($_SESSION['cart'] as $key => $entry) {
			if((int)$entry['item'] == (int)$item) {
				$_SESSION['cart'][$key]['qnt'] += (int)$qnt;
				$found = TRUE;
				return 'Item quantity increased';
			}
		}
		
		//Add item if not already in cart 
		if($found == FALSE) {
			$cartitem = array('item' => $item, 'name' => $name, 'qnt' => $qnt, 'price' => $price);
			array_push($_SESSION['cart'], $cartitem);
			return 'Item added to cart';
		}
	}
	
	//Modifies item quantity
	public function quant($item, $newqnt) {
		foreach($_SESSION['cart'] as $key => $entry) {
			if((int)$entry['item'] == (int)$item) {
				if($newqnt == 0){
					unset($_SESSION['cart'][$key]);
				}else{
					$_SESSION['cart'][$key]['qnt'] = (int)$newqnt;
					return 'Item quantity modified';
				}
			}
		}
	}
	
	//Removes item from cart given item id
	public function remove($id) {
		foreach($_SESSION['cart'] as $key => $item) {
			if((int)$item['item'] == (int)$id) {
				unset($_SESSION['cart'][$key]);
			}
		}
		return 'Item removed from cart';
	}
	
	//Saves session cart to database
	public function save() {
		//Call parent constructor to open db connection
		parent::__construct();
		
		//Check that user is logged in i.e. has ID in session
		if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
			//Build insert statement
			$uid = $_SESSION['uid'];
			$stmt = 'INSERT INTO cart'.$uid.' VALUES ';
			foreach($_SESSION['cart'] as $item) {
				$stmt .= '('.$item['item'].', '.$item['qnt'].'),';
			}
			$stmt = rtrim($stmt, ', ');

			//Create new user cart table and insert cart data
			$create = $this->conn->prepare(
				'DROP TABLE IF EXISTS cart'.$uid.'; '
				.'CREATE TABLE cart'.$uid.'(itemid INT(7) ZEROFILL NOT NULL, qnt INT(3) NOT NULL); '
				.$stmt
			);
			$create->execute();

			return 'Cart saved!';
		} else {
			return 'Please log in to save your cart.';
		}
	}
	
	//Clears session cart
	public function clear() {
		unset($_SESSION['cart']);
		return 'Cart cleared.';
	}
}
?>