<?php 
require('../lib/mvc.php');
session_start();
session_destroy();
header('Location: ../views/login.php');
?>