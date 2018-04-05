<?php
session_start();
require('../lib/mvc.php');
require(models.'inventoryclass.php');
$inv = new inventory();
$id = $_REQUEST["id"];

$inv->deleteitem($id);
?>