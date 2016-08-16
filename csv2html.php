<?php

main($argv[1]);

/*----------------------------------------------------------------------------*/

function main($fileName){
	$arr = csvToArray($fileName);
	echo makeHtmlTable($arr);
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
 * output to an html table
 */
function makeHtmlTable($arr) {
  if(count($arr)<1){
    return null;
  }
  echo "<table>".PHP_EOL;
  //echo "<tr>".PHP_EOL;
  //foreach(array_keys($arr[0]) as $colName){
  //  echo "<td>$colName</td>".PHP_EOL;
  //}
  //echo "</tr>".PHP_EOL;
  foreach($arr as $row){
    echo "  <tr>".PHP_EOL;
    foreach($row as $cell){
      echo "    <td>$cell</td>".PHP_EOL;
    }
    echo "  </tr>".PHP_EOL;
  }
  echo "</table>".PHP_EOL;
}
?>
