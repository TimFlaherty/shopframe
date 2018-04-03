<?php
if (isset($_GET['source'])) {
	highlight_file($_SERVER['SCRIPT_FILENAME']);
	exit;
}

define('tld' , '/srv/cs130b/');
define('app' , tld . 'working/');
define('controllers' , app . 'controllers/');
define('models' , app . 'models/' );
define('views' , app . 'views/');
define('layouts' , views  . 'layouts/');
define('img' , views  . 'img/');
define('lib' , app . 'lib/');
?>