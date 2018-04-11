<?php
session_start();
require('../lib/mvc.php');
require(models.'inventoryclass.php');
$inv = new inventory();
$name = $_REQUEST["name"];
$price = $_REQUEST["price"];
$cat = $_REQUEST["cat"];
$subcat = $_REQUEST["subcat"];
$description = $_REQUEST["desc"];

$inv->additem($name, $price, $cat, $subcat, $description);
echo $inv->id;
?>