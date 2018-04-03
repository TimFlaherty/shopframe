<?php
session_start();
$access = (int)$_SESSION['access'];
if($access < 2) {
	header('Location: 403.php');
}
echo '<h1>This is the employee page</h1>';
echo '<p>Your access level is: '.$_SESSION['access'].'</p>';
echo '<p><a href="adminview.php">Admin Page</a></p>';
echo '<p><a href="customerview.php">Customer Page</a></p>';
?>