<?php
require('../lib/mvc.php');
require(models.'onlineVisibility.php');
var_dump($_POST);
echo '<br><br>';
$control = new onlineVisibility();
$control->updateOnlineParams($_POST);
?>