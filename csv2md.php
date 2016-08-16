<?php

main($argv[1]);

/*----------------------------------------------------------------------------*/

function main($fileName){
	$arr = csvToArray($fileName);
	echo flattedTable($arr);
}

/*----------------------------------------------------------------------------*/

/**
 * read a csv file into an array
 * returns array
 */
function csvToArray($fileName){
	$arr = array_map('str_getcsv', file($fileName));
	return $arr;
}
	
/**
 * Turn table into linear list
 */
function flattedTable($arr) {
	if(count($arr)<2){
		return null;
	}

	// get header
	$header = $arr[0];
    
	for($rowNum=1; $rowNum<count($arr); $rowNum++){
		for($colNum=0; $colNum<count($arr[$rowNum]); $colNum++){
			
			// echo header for this item
			echo "$header[$colNum]".PHP_EOL."========================================".PHP_EOL.PHP_EOL;
			
			// echo actual value
			echo $arr[$rowNum][$colNum].PHP_EOL.PHP_EOL.PHP_EOL; 
		}
		if($rowNum<count($arr)-1) {
			// echo horizontal rule to end this row
			echo "********************************************************************************".PHP_EOL.PHP_EOL;
		}
	}
}
?>
