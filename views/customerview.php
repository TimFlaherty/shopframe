<?php
session_start();
$access = (int)$_SESSION['access'];
if($access < 1) {
	header('Location: 403.php');
}
echo '<h1>This is the customer page</h1>';
echo '<p>Your access level is: '.$_SESSION['access'].'</p>';
echo '<p><a href="adminview.php">Admin Page</a></p>';
echo '<p><a href="employeeview.php">Employee Page</a></p>';
?>