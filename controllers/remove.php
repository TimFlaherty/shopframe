<?php
require('../lib/mvc.php');
require(models.'cart.php');
$cart = new cart();

$item = $_REQUEST["item"];

$cart->remove($item);
?>