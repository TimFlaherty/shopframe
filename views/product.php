<?php
require('../lib/mvc.php');
require(models.'productclass.php');
$product = new product();
?>
<html>
<head>
<title><?=$product->itemname;?></title>
<link rel="stylesheet" type="text/css" href="../views/css/shop.css">
<script src="../controllers/ajax.js"></script>
</head>

<body>
<div id="head"></div>
<h3 id="name<?=$product->itemid?>"><?=$product->itemname?></h3>
<?php
foreach($product->getPix($product->itemid) as $pic){
echo '<p><img src="img/'.$pic['filename'].'" class="thumb"></p>';
}
?>
<p id="price<?=$product->itemid?>" value="<?=$product->itemprice?>">$<?=$product->itemprice?></p>
<p><?=$product->description?></p>
<p>Quantity: <input id="qnt<?=$product->itemid?>" type="number" name="qnt" min="1" max="10" value="1"></p>
<button value="<?=$product->itemid?>" onclick="add(this.value)">Add to cart</button>
</body>
</html>