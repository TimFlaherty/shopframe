<?php
include('../lib/mvc.php');
include(models.'empclass.php');
session_start();

$emp = new employee($_SESSION['uid']);
$emp->usesh();

echo 'Employee ID: '.$emp->empid;

echo '<br>Your store is: '.$emp->empstore;
?>