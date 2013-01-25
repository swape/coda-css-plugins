#!/usr/bin/php
<?php

$input = "";

$fp = fopen("php://stdin", "r");
while ( $line = fgets($fp, 1024) )
	$input .= $line;
	
fclose($fp);

$input =  doThings($input);
$input =  otherThings($input);
echo $input;

// doing things
function doThings($input){
	$input = str_replace('  ', ' ', $input);
	$input = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $input);
	$input = str_replace(": ", ":", $input);
	$input = str_replace(" :", ":", $input);
	$input = str_replace("; ", ";", $input);
	$input = str_replace(" ;", ";", $input);
	$input = str_replace(";}", "}", $input);
	$input = str_replace(" {", "{", $input);
	$input = str_replace("{ ", "{", $input);
	$input = str_replace(" 0px ", " 0 ", $input);
	$input = str_replace(":0px ", ":0 ", $input);
	$input = str_replace(" ,", ",", $input);
	$input = str_replace("}", "}\n", $input);
	return $input;
}

function otherThings($input){
	$input = str_replace('}', "\n}", $input);
	$input = str_replace(';', ";\n\t", $input);
	$input = str_replace('{', "{\n\t", $input);
 	$input = str_replace('*/', "*/\n", $input); 
 	$input = str_replace('@', "\n@", $input); 
 	$input = str_replace('\n\n', "\n", $input);
 	$input = str_replace('\t/*', "/*", $input);
	return $input;	
}







?>