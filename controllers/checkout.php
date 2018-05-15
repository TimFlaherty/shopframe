<?php
include('../lib/mvc.php');
include(models.'order.php');
$order = new order();
$order->neworder();
unset($_SESSION['cart']);
header('Location: ../views/orders.php?orderid='.$order->orderid);
?>