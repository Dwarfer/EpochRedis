<?php
/*
	EpochMod Redis tools
	http://www.deadmenrising.net/
	By Dwarfer
	
	Example file to show deleting the Old AI_ITEMS once an AI Trader has been killed
*/

require 'include/connect.inc.php';
require 'include/functions.inc.php';

print "Loading the AI Traders DATA\n";
$AI_ID = ListRedisIDs('AI:*');
$AI_ITEM_ID = ListRedisIDs('AI_ITEMS:*');

//Checks to see if AI_ITEM_ID has extra data that is not in the AI_ID
$AI_DIFF = array_diff_key($AI_ITEM_ID, $AI_ID);
print "Found " . count($AI_DIFF) . " Orphan AI_ITEMS\n";
foreach($AI_DIFF as $X=>$Y ){
	//Deletes the old ai_items
	print "Deleting $Y\n";
	$RDClient-> del($Y);
}
	

?>