<?php
session_start();
require('../lib/mvc.php');
require(models.'cart.php');
$cart = new cart();

$item = $_GET['item'];
$qnt = $_GET['qnt'];

$cart->quant($item, $qnt);

echo '<a href="#" id="qnt'.$item.'" onclick="modqnt('.$item.');">'.$qnt.'</a>';
?>