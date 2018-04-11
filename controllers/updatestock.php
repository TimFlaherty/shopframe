<?php
require('../lib/mvc.php');
require(models.'stockclass.php');
$stock = new stock();
$itemid = $_REQUEST['itemid'];
$storeid = $_REQUEST['storeid'];
$location = $_REQUEST['location'];
$amount = $_REQUEST['amount'];

$stock->modstock($itemid, $storeid, $location, $amount);
echo 'SWEET';
?>