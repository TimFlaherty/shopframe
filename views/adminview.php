<?php
require('../lib/mvc.php');
require(views.'onlineVis.php');
session_start();
$access = (int)$_SESSION['access'];
if($access < 3) {
	header('Location: 403.php');
} else if($access == 3) {
	echo '<h1>This is the admin page</h1>';
	echo '<p>Your access level is: '.$access.'</p>';
	echo '<p><a href="employeeview.php">Employee Page</a></p>';
	echo '<p><a href="customerview.php">Customer Page</a></p>';
	
	viscontrol();
}
/*
CREATE VIEW online_stock AS
	SELECT b.*, 
	SUM(a.amount) AS 'amount' 
	FROM stock a 
	JOIN inventory b 
	ON a.itemid = b.itemid 
	AND a.location = 'BACK' 
	GROUP BY itemid;
	
SELECT b.*,  SUM(a.amount) AS 'amount', c.storeid, c.storename FROM stock a  JOIN inventory b  ON a.itemid = b.itemid  AND a.location IN('BACK', 'FLOOR')  JOIN stores c ON a.storeid = c.storeid AND c.storename IN('location2') GROUP BY a.itemid;
SELECT b.*,  SUM(a.amount) AS 'amount', c.storeid, c.storename FROM stock a  JOIN inventory b  ON a.itemid = b.itemid JOIN stores c ON a.storeid = c.storeid AND c.storename IN('location2', 'location1') AND a.location IN('BACK', 'FLOOR') GROUP BY a.itemid;

	*/
?>