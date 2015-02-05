<?php
/*
	EpochMod Redis tools
	http://www.deadmenrising.net/
	By Dwarfer
*/

//This Function builds the list of Traders
function ListRedisIDs($keys){
	global $RDClient;
	global $InstanceID;
	$IDReturn = array();
	$ITEM_DATA = $RDClient-> keys($keys);

	foreach($ITEM_DATA as $x=>$DATA){
		list($TB, $IN, $ID) = explode(":", $DATA);
		//Lets Check the InstanceID now
		if($InstanceID!=$IN) continue;
		$IDReturn[$ID] = $DATA;
	}
	ksort($IDReturn);
	return $IDReturn;
}

//This Function Adds/Updates the new value to the Array and 
function Update_Item_In_Traders($tid,$data,$item,$count){
	if($data){
		if(isset($data[$item])){
			if($data[$item]<=$count){
				$data[$item] = $count;
 			}
		}else{
			$data[$item] = $count;
		}
	}else{
		$data[$item] = $count;
	};
	return $data;
};

//This Function Find the and returns all the needle found in the haystack
function Find_Item_In_Traders($haystack,$needle){
	$rtd = array();
	foreach($haystack as $A=>$B){
		if($B){
			foreach($B as $C=>$D){
				if($needle==$C){
					//echo "### $A $B $C $D\n";
					$rtd[$A][$C] = $D;
				}
			}
		}
	}
	return $rtd;
}

//This Function takes the Array and changes it back into the Epoch Storage
function Build_Trader_Items_Format($TDA){
//	var_dump($TDA);
	$t = 0;
	foreach($TDA as $A => $B){
			$I[$t] = "\"$A\"";
			$C[$t] = "$B";
			$t++;
	}
	return "[[" . implode(',', $I) . "],[" . implode(',', $C) . "]]";
};

//This Function builds all the Trader items into a PHP Array.
function Build_Trader_Items_Array($AI_ID){
	global $RDClient;
	global $InstanceID;
	$TDA = array();
	foreach($AI_ID as $X=>$Y ){
		list($TB, $IN, $ID) = explode(":", $Y);
		//Lets Check the InstanceID now
		if($InstanceID!=$IN) continue;
		$Trader_Items = $RDClient-> get("AI_ITEMS:$IN:$ID");
		$SD = json_decode($Trader_Items);
		if($SD){
			if($SD[0]){
				foreach($SD[0] as $R=>$S){
					$TDA[$ID][$S] = $SD[1][$R];
				}
			}else{
				$TDA[$ID] = NULL;
			}
		}else{
			$TDA[$ID] = NULL;
		}
	}
	return $TDA;
}

?>