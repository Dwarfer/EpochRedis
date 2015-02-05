<?php
/*
	EpochMod Redis tools
	http://www.deadmenrising.net/
	By Dwarfer
*/

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

// You will need to change these settings to match your own file.
$myRedisPass = "SOME PASS";
$myRedisPort = 1234;
$myRedisHost = 'x.x.x.x';
$myRedisDB = "0";
$InstanceID = "XX";

//This includes my local config as I don't need to put my main passwords here :-) you can comment this out with //
if(file_exists('../../config.inc.php'))
    include '../../config.inc.php';

?>
