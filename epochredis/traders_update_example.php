<?php
/*
	EpochMod Redis tools
	http://www.deadmenrising.net/
	By Dwarfer
	
	This file is for traders
*/

require 'include/connect.inc.php';
require 'include/functions.inc.php';

print "Loading the AI DATA\n";
$AI_ID = ListRedisIDs('AI:*');

//For My own Testing
//	$AI_ID = NULL;
//	$AI_ID[] = "AI:CH402:50";
//	$AI_ID[] = "AI:CH402:47";
//	$AI_ID[] = "AI:CH402:23";
//	$AI_ID[] = "AI:CH402:42";

print "Found " . count($AI_ID) . " Traders\n";
print "Building Array data\n";
$TDA = Build_Trader_Items_Array($AI_ID);

if($TDA){
	print "Built Array data\n";
	print "\tNow lets do something with it\n";
	print "\tLets Add 3 med packs, 3 scam_epoch and 3 ItemSodaBurst and  to each trader\n";
	print "\tSo Far " . count(Find_Item_In_Traders($TDA,"FAK")) . " Traders Have Meds in stock\n";
	print "\tSo Far " . count(Find_Item_In_Traders($TDA,"scam_epoch")) . " Traders Have scam_epoch in stock\n";
	print "\tSo Far " . count(Find_Item_In_Traders($TDA,"ItemSodaBurst")) . " Traders Have ItemSodaBurst in stock\n";
	foreach($TDA as $TID=>$DATA){
		$DATA = Update_Item_In_Traders($TID,$DATA,"FAK",3);
		$DATA = Update_Item_In_Traders($TID,$DATA,"scam_epoch",3);
		$DATA = Update_Item_In_Traders($TID,$DATA,"ItemSodaBurst",3);
		//Rember to Update the stored array for more proccessing if need be
		$TDA[$TID] = $DATA;
		
		//Lets now Build The Update command and run it
		$RDClient-> set("AI_ITEMS:$InstanceID:$TID",Build_Trader_Items_Format($DATA));
	};
	
	print "\tNow " . count(Find_Item_In_Traders($TDA,"FAK")) . " Traders have 3 or more Meds in stock\n";
	print "\tNow " . count(Find_Item_In_Traders($TDA,"scam_epoch")) . " Traders have 3 or more scam_epoch in stock\n";
	print "\tNow " . count(Find_Item_In_Traders($TDA,"ItemSodaBurst")) . " Traders have 3 or more ItemSodaBurst in stock\n";
}



?>