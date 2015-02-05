<?php
/*
	EpochMod Redis tools
	http://www.deadmenrising.net/
	By Dwarfer
*/

require 'config.inc.php';
require 'Predis/Autoloader.php';


Predis\Autoloader::register();

$RDClient = new Predis\Client([
	'scheme' => 'tcp',
	'host'   => $myRedisHost,
	'password' => $myRedisPass,
	'port' => $myRedisPort,
	'database' => $myRedisDB
]);


?>
