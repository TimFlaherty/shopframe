<?php
session_start();
require('../lib/mvc.php');
require(models.'inventoryclass.php');
$inv = new inventory();
$target = $_REQUEST["target"];
$value = $_REQUEST["newval"];
$id = $_REQUEST["id"];

$inv->moditem($target, $value, $id);
?>