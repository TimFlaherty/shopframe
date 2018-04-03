<?php
// Display source files 
if (isset($_GET['source'])) { 
    echo '<h1>login.php</h1>'; 
    highlight_file($_SERVER['SCRIPT_FILENAME']); 
    echo '<h1>logfunc.php</h1>'; 
    highlight_file('../controllers/logfunc.php'); 
    echo '<h1>user.php</h1>'; 
    highlight_file('../models/user.php');
    echo '<h1>adminview.php</h1>'; 
    highlight_file('adminview.php');
    echo '<h1>employeeview.php</h1>'; 
    highlight_file('employeeview.php');  
    echo '<h1>customerview.php</h1>'; 
    highlight_file('customerview.php');  
    echo '<h1>handler.php</h1>'; 
    highlight_file('../controllers/handler.php');  
    echo '<h1>dbclass.php</h1>'; 
    highlight_file('../models/dbclass.php');
    exit; 
} 

session_start(); 
?>
<html>
<head>
<title>Log In</title>
</head>

<body>
<h2>Please log in to continue:</h2>
<form action="../controllers/logfunc.php" method="POST">
<table>
	<tr>
		<td>Username:</td>
		<td><input type="text" name="uname"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="pswd"></td>
	</tr>
</table>
<input type="submit" value="Log In">
</form>
<h3>Username:Password Combinations for Testing</h3>
<p>admin:cs130b</p>
<p>employee:employed</p>
<p>customer:shopping</p>
<a href="?source"><input type="button" value="View Page Source"></a> 
<br> 
<br> 
<a href="https://hills.ccsf.edu/~tflaher2/cs130b/index.php"><input type="button" value="Return to Index"></a> 
</body>
</html>
