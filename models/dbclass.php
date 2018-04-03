<?php
if (isset($_GET['source'])) {
	highlight_file($_SERVER['SCRIPT_FILENAME']);
	exit;
}

//Database connection class
class dbconn {
	protected $conn = null; //Private variable contains PDO instance
	protected $dbtype = "";
	protected $servername = "";
	protected $username = "";
	protected $password = "";
	protected $db_name = "";
	//Declare variable to allow public visibility for last insert ID (set in write function)
	public $id;

	//Constructor initiates database connection
	public function __construct() {
		try {
			$this->conn = new PDO("$this->dbtype:host=$this->servername;dbname=$this->db_name", 
			$this->username, 
			$this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		}
		catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
	
	//Displays single row info from table
	public function read($target, $table, $field, $term) {
		$sqlread = $this->conn->prepare('SELECT '.$target.' FROM '.$table.' WHERE '.$field.' = '.$term);
		$sqlread->execute();
		$result = $sqlread->fetch(PDO::FETCH_ASSOC);
		return $result;//."<br>".$errcode;
	}
	
	//Displays info from multiple rows of table
	public function readAll($target, $table, $field, $term) {
		$sqlread = $this->conn->prepare('SELECT '.$target.' FROM '.$table.' WHERE '.$field.' = '.$term);
		$sqlread->execute();
		$result = $sqlread->fetchAll(PDO::FETCH_ASSOC);
		return $result;//."<br>".$errcode;
	}
	
	//Inserts data to table
	public function write($table, $data) {
		$str = count($data);
		$out = '';
		for($x=0;$x<$str;$x++) {
			$out .= "?";
			$out .= ",";
		};
		$fields = rtrim($out, ', ');
		$sqlwrite = $this->conn->prepare('INSERT INTO '.$table.' VALUES ('.$fields.')');
		$sqlwrite->execute($data);
		$this->id = $this->conn->lastInsertId();
	}
	
	//Update table
	public function update($table, $field, $newval, $target, $val) {
		$sqlread = $this->conn->prepare('UPDATE '.$table.' SET '.$field.' = '.$newval.' WHERE '.$target.' = '.$val);
		$sqlread->execute();
		return TRUE;//."<br>".$errcode;
	}
	
	//Deletes item from inventory given ID number
	public function delete($table, $field, $term) {
		$sqldelete = $this->conn->prepare('DELETE FROM '.$table.' WHERE '.$field.' = '.$term);
		$sqldelete->execute();
		return TRUE;
	}
}
?>