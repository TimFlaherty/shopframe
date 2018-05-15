<?php
include_once('../lib/mvc.php');
include_once(models.'stockclass.php');
$stock = new stock();
$itemid = $_REQUEST['itemid'];
$storeid = $_REQUEST['storeid'];
$location = $_REQUEST['location'];
$amount = $_REQUEST['amount'];

$stock->modstock($itemid, $storeid, $location, $amount);
echo 'Stock updated!';
?>