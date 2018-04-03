<?php
// Display source files
if (isset($_GET['source'])) {
    echo '<h1>session.php</h1>';
    highlight_file($_SERVER['SCRIPT_FILENAME']);
    echo '<h1>sessionclass.php</h1>';
    highlight_file('sessionclass.php');
	echo '<h1>handler.php</h1>';
    highlight_file('handler.php');
    exit;
}
?> 
<html>
<head>
<title>PHP PDO & Sessions</title>
<style>
    table, td {
        border-style:solid;
        border-collapse:collapse;
        padding:3px;
    }
</style>
</head>
<body>
<h1>PHP PDO & Sessions</h1>
<a href="?source"><input type="button" value="View Page Source"></a>
<br>
<br>
<a href="https://hills.ccsf.edu/~tflaher2/cs130b/index.php"><input type="button" value="Return to Index"></a>
<?php
require('handler.php');

echo "<h3>Initiating a connection:</h1>";
//New handler initiates connection from constructor
$dbconn = new handler();
echo "<br><br><h3>Reading data from the database:</h1>";

//Read row given item ID number
$dbconn->read(2);
echo "<br><br><h3>Writing data to the database:</h1>";

//Declare array of new item data
$insertdata = array(NULL, "Chips", 2.50, "Just a regular old bag of chips.");
print_r($insertdata);
echo "<br><br>Writing...<br><br>";
//Write data array to database
$dbconn->write($insertdata);

//Display last inserted row
$dbconn->read($dbconn->id);

echo "<h3>Deleting data from the database:</h1>";
$dbconn->delete($dbconn->id);

echo "<h3>Ending the session: </h3>";
$dbconn->sessionclose();

echo "<h3>Mission Accomplished</h3>";
?>
</body>
</html>