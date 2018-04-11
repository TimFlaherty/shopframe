<?php
interface iUser {
	//All instances must generate user info on construct given user ID
	public function __construct($id);
	
	//All instances must store basic user data in session
	public function usesh();
}
?>