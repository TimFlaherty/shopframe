<?php
include('../lib/mvc.php');
include(models.'iUser.php');

class employee implements iUser {
	public $empid;
	public $empstore;
	
	public function __construct($id) {
		session_start();
		$this->empid = $id;
	}
	
	public function usesh() {
		$this->empstore = 'location1';
		$_SESSION['empstore'] = $this->empstore;
	}
}
?>