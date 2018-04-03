<?php
require('../lib/mvc.php');
//require(controllers.'handler.php');
//Simple user model
class user extends handler {
	//Class variables
	public $uid;
	public $uname;
	public $access;
	public $email;

	public function __construct($id) {
		//Connect to database, return user info given ID
		parent::__construct();
		$udata = $this->read('uname, access, email','usr','uid',$id);
		//Set class vars
		$this->uid = $id;
		$this->uname = $udata['uname'];
		$this->access = $udata['access'];
		$this->email = $udata['email'];
	}
	
	public function usesh() {
		session_start();
		$_SESSION['uid'] = $this->uid;
		$_SESSION['uname'] = $this->uname;
		$_SESSION['access'] = $this->access;
	}
}
?>