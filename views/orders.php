<?php
include('../lib/mvc.php');
include(models.'order.php');
$oid = $_REQUEST['orderid'];
$order = new order;
$info = $order->orderinfo($oid);
?>
<html>
<head>
<title>Cool Store - Order #<?=$oid?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/shop.css">
<script src="../controllers/ajax.js"></script>
</head>

<body>
<div id="head"></div>
<div id="disp" class="container">
<h1>Order #<?=$oid?></h1>
<?php
$total = 0;
echo '<table><tr><th>Item</th><th>Price</th><th>Quantity</th><th>Item Total</th></tr>';
foreach($info as $item) {
	echo '<tr><td><a href="../views/product.php?itemid='
		.$item['itemid'].'">'
		.$item['itemname']
		.'</a></td><td>$'
		.$item['itemprice']
		.'</td><td>'
		.$item['qnt']
		.'</td><td>$'
		.number_format(($item['itemprice']*$item['qnt']), 2)
		.'</td></tr>';
	$total += $item['itemprice']*$item['qnt'];
}
echo '<tr><th colspan="3">Order Total: </th><td><b>$'.number_format($total, 2).'</b></td></tr>';
echo '</table>';
?>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
