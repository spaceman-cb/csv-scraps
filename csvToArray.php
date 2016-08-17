<?php
/**
 * read a csv file into an array
 * largely copied from:
 * http://jp2.php.net/manual/en/function.fgetcsv.php#refsect1-function.fgetcsv-examples
 * returns array
 */

function csvToArray($fileName){
	//save default setting for line ending detection. we will restore it when we're done
	$auto_detect_line_endings_default = ini_get('auto_detect_line_endings');
	//set line ending compatability with osX
	ini_set('auto_detect_line_endings', true);

	$row = 1;
	$arr = array();
	if (($handle = fopen($fileName, "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$arr[$row-1]=$data;
		$row++;
	    }
	    fclose($handle);
	}
	
	//reset auto_detect_line_endings to system default
	ini_set('auto_detect_line_endings', $auto_detect_line_endings_default);
	return $arr;
}
?>
