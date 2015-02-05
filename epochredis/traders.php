<?php
/*
	EpochMod Redis tools
	http://www.deadmenrising.net/
	By Dwarfer
*/

// This is a work in progress this file

require 'include/connect.inc.php';
require 'include/functions.inc.php';
	print "Loading the AI DATA\n";
    $AI_ID = ListRedisIDs('AI:*');
	print "Found " . count($AI_ID) . " Traders\n";

	foreach($AI_ID as $X=>$Y ){
		$Trader = $RDClient-> get($Y);
		print "#####################################################################\n";
		print "Trader Location:$Trader\n";
		$Trader_Items = $RDClient-> get("AI_ITEMS:$InstanceID:$X");
		print "Trader Items:\n$Trader_Items\n";

	}
	

?>