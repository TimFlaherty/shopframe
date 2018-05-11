<?php
require('../lib/mvc.php');
require(models.'cart.php');
$cart = new cart();

echo $cart->save();
?>