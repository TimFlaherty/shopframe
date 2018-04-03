<?php
require('../lib/mvc.php');
require(models.'store.php');
$store = new store();
echo 'Creating new store...'; 
//$store->newstore('location2', array('ln1'=>'22 Hypothetical Place','ln2'=>'Suite 800','city'=>'San Francisco','state'=>'CA','zip'=>'94109'));
echo 'Success!';
?>