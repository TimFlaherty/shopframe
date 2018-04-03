<html>
<head>
<?php 
require('../lib/mvc.php');
require(controllers.'/handler.php');
require('cats.php'); 
//session_start();
//var_dump($_SESSION);
?>
<title>Cool Store</title>
<link rel="stylesheet" type="text/css" href="../views/css/shop.css">
<script src="../controllers/ajax.js"></script>
</head>

<body>
<div id="head">
</div>
<br>
<?php showcats(); ?>
<div id="disp"></div>
</body>
</html>
