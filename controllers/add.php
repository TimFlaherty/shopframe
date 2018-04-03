<?php
require('../lib/mvc.php');
require(models.'cart.php');
$cart = new cart();

$item = $_REQUEST["item"];
$name = $_REQUEST["name"];
$qnt = $_REQUEST["qnt"];
$price = $_REQUEST["price"];

echo $cart->add($item, $name, $qnt, $price);
?>