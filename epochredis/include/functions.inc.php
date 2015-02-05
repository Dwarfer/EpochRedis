<?php
/*
	EpochMod Redis tools
	http://www.deadmenrising.net/
	By Dwarfer
*/


function ListRedisIDs($keys){
	global $RDClient;
	$IDReturn = array();
	$ITEM_DATA = $RDClient-> keys($keys);
	var_dump($ITEM_DATA);
	
	foreach($ITEM_DATA as $x=>$DATA){
		list($TB, $IN, $ID) = explode(":", $DATA);
		$IDReturn[$ID] = $DATA;
	}
	return $IDReturn;
}


/*	
    foreach($vehicles as $op) {
        $vehicleD = $client-> get($op);
        if($vehicleData == '['){
            $vehicleData = $vehicleData . $vehicleD;
            $puidArray = $puidArray . '"'.$op.'"';
        }else{
            $vehicleData = $vehicleData . ',' .$vehicleD;
            $puidArray = $puidArray . ',"'.$op.'"';
        }
    }
    $puidArray =   $puidArray  . ']';
    $vehicleData = $vehicleData . ']';
//    echo '['.$vehicleData . ',' . $puidArray . ']';

*/



?>