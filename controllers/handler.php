<?php
if (isset($_GET['source'])) {
	highlight_file($_SERVER['SCRIPT_FILENAME']);
	exit;
}

include('../lib/mvc.php');
require(models.'dbclass.php');
class handler extends dbconn {
	protected $dbtype = "mysql";
	protected $servername = "localhost";
	protected $username = "tmf";
	protected $password = "YOUR DB PASSWORD HERE";
	protected $db_name = "shop";
}
?>