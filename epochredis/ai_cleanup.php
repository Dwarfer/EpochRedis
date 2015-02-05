<?php
/*
	EpochMod Redis tools
	http://www.deadmenrising.net/
	By Dwarfer
*/

require 'include/connect.inc.php';
require 'include/functions.inc.php';
	print "Loading the AI DATA\n";
    $AI_ID = ListRedisIDs('AI:*');
	$AI_ITEM_ID = ListRedisIDs('AI_ITEMS:*');
	//var_dump($AI_ID,$AI_ITEM_ID);
	
	//Checks to see if AI_ITEM_ID has extra data that is not in the AI_ID
	$AI_DIFF = array_diff_key($AI_ITEM_ID, $AI_ID);
	print "Found " . count($AI_DIFF) . " orphan AI_ITEMS\n";
	foreach($AI_DIFF as $X=>$Y ){
		//Deletes the old ai_items
		print "Deleting $Y\n";
		$RDClient-> del($Y);
	}
	

?>